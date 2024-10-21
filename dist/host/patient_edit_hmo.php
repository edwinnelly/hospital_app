<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$get_staff_name = $app->get_request('st');
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id JOIN hmo_profiles ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
    ;
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:Edit Patient</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu ">

    <div id="body" class="theme-blue">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="mt-3"><img class="zmdi-hc-spin w60" src="../assets/images/loader.svg" alt=""></div>
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
                                <li class="breadcrumb-item">Plans</li>
                                <li class="breadcrumb-item active">Update</li>
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Hmo Profile /
                                <?php echo $data['patient_name']; ?>
                            </h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_hmo.php"><button class="btn btn-default hidden-xs ml-2">Manage
                                    Patient</button></a>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">


                <div class="row clearfix">


                    <div class="col-lg-12">


                        <div class="card">

                            <div class="body d-flex">
                                <div class="profile-image mr-4">
                                    <img src="../profile_pic/<?php echo ($data['photo']); ?>"
                                        class="w90 rounded-circle shadow" alt="" style="">

                                </div>
                                <div class="details">
                                    <h5 class="mt-0 mb-0"><strong><?php echo $data['patient_name']; ?></strong></h5>
                                    <span
                                        class="text-muted font-13"><?php echo htmlspecialchars($data['hmo_name']); ?></span>
                                    <p class="mb-1"><?php echo htmlspecialchars($data['address']); ?></p>
                                </div>
                            </div>


                            <div id="notificationContainer" style="width:500px"></div>

                            <form name="myForm" id="myForm" method="post">
                                <form name="myForm" id="myForm" method="post" class="form mt-5">
                                    <div class="body">
                                        <div class="row clearfix">
                                            <input type="hidden" name="pid" value="<?php echo $get_staff_id; ?>" />

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="hmo_id" id="hmo_id">

                                                        <?php
                                                        $query = "SELECT * FROM hmo_profiles where hmo_id=$hmo_key";
                                                        $hmo = $app->fetch_query($query);
                                                        foreach ($hmo as $datas) {
                                                            ?>
                                                            <option value="<?php echo $datas['id']; ?>">
                                                                <?php echo $datas['profile_name']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="reset-btn" class="btn btn-primary">Update
                                                        Plan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>


                    <div class="col-lg-12">
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
        $(document).ready(function () {

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                e.preventDefault();
                var btn = $("#reset-btn");
                btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                var datas = new FormData(this);
                $.ajax({
                    url: "ajax/update_patient_hmo",
                    type: "post",
                    data: datas,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {
                        if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Account Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
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