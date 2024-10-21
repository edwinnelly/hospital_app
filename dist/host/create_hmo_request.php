<?php
include "config/checkers.php";
$get_name = base64_decode($app->get_request('st'));
$get_pid = base64_decode($app->get_request('fid'));
//check if the pid exist or die
if (!($get_pid)) {
    die("Invalid HMO ID");
}
//check if the name exist or die
if (!($get_name)) {
    die("Invalid HMO Name");
}
//check if the hmo has already requested for this patient or die
$query_hmo = "select * from patient_data where pid='$get_pid'";
$userInfos_hmo = $app->fetch_query($query_hmo);
foreach ($userInfos_hmo as $userInfo_hmos)
    ;
$hmo_id = $userInfo_hmos['hmo_id'];
$hmo_plans = $userInfo_hmos['hmo_plans'];
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Hmo Request ::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">


    <!-- Morris Chart Css-->
    <link rel="stylesheet" href="../assets/plugins/morrisjs/morris.css" />
    <!-- Colorpicker Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <!-- Multi Select Css -->
    <link rel="stylesheet" href="../assets/plugins/multi-select/css/multi-select.css">
    <!-- Bootstrap Spinner Css -->
    <link rel="stylesheet" href="../assets/plugins/jquery-spinner/css/bootstrap-spinner.css">
    <!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- noUISlider Css -->
    <link rel="stylesheet" href="../assets/plugins/nouislider/nouislider.min.css" />


</head>

<body class="font-ubuntu ">

    <div id="body" class="theme-blue">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="mt-3"><img class="zmdi-hc-spin w60" src="../assets/images/loader.svg" alt="Amaze"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <div class="overlay"></div>

        <!-- Top Bar -->
        <?php
        include "inc/nav.php";
        include "inc/header.php";
        include "inc/rightside.php";
        ?>

        <!-- Main Content -->
        <div class="body_area after_bg sm">

            <div class="block-header">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="userdir_hmo.php">Home</a></li>
                                <li class="breadcrumb-item">Request</li>
                                <li class="breadcrumb-item active">Add</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Add Hmo Request</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="hmo_request_app"><button class="btn btn-default hidden-xs ml-2">Manage
                                    Request</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>

                            <form name="myForm" id="myForm" method="post" class="form mt-5">
                                <div class="body">
                                    <div class="row clearfix">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" id="" class="form-control" name="username"
                                                    placeholder="Full Name" readonly value="<?php echo $get_name; ?>">

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" id="" class="form-control" name="title"
                                                    placeholder="Bill Request Tittle" required>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" readonly
                                                    value="<?php echo ($get_pid); ?>" id="pid" placeholder="PID"
                                                    name="pid" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-lg-12 col-md-12">
                                                    <p> <b>Choose Services</b> </p>
                                                    <select class="form-control z-index show-tick" name="services_id[]"
                                                        multiple data-live-search="true">
                                                        <?php
                                                        $services_hospital = $app->fetch_query($services_hospital);
                                                        foreach ($services_hospital as $services_hospitals) {
                                                            ?>
                                                            <option value="<?= $services_hospitals['id']; ?>">
                                                                <?= $app->stringFormat($services_hospitals['name'], 25); ?>
                                                            </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <input type="hidden" name="hmo_id" value="<?php echo $hmo_id; ?>">
                                            <input type="hidden" name="hmo_plan" value="<?php echo $hmo_plans; ?>">
                                            <input type="hidden" name="docid" id="" value="<?php echo uniqid(); ?>">

                                        </div>

                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="mt-4">
                                                <button type="submit" id="reset-btn" class="btn btn-primary">Send
                                                    Request</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <?php
                include "inc/footer.php";
                ?>
            </div>

        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
    <script src="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../assets/plugins/summernote/dist/summernote.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //validate email
        $(document).ready(function () {


            /* function to login user */
            $("#myForm").on('submit', (function (e) {

                e.preventDefault();
                var btn = $("#reset-btn");
                btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                var datas = new FormData(this);
                $.ajax({
                    url: "ajax/addhmo_request",
                    type: "post",
                    data: datas,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {

                        if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Request Sent, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                    .attr("disabled", false)
                                    .html("Request Sent");
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Posting Failed try again!",
                                icon: "error",
                            });

                        }

                    },

                });


            }));

        });
    </script>
</body>

</html>