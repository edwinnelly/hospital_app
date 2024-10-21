<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));

$query = "SELECT 
radio_graphy_test.*, 
radio_departments.DepartmentName 
FROM 
radio_graphy_test
JOIN 
radio_departments 
ON 
radio_graphy_test.radio_dpt = radio_departments.DepartmentID
 where radio_graphy_test.id='$get_staff_id'";
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

    <title>:Edit Radiography Profile</title>
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
        <!-- <div class="page-loader-wrapper">
            <div class="loader">
                <div class="mt-3"><img class="zmdi-hc-spin w60" src="../assets/images/loader.svg" alt="Amaze"></div>
                <p>Please wait...</p>
            </div>
        </div> -->

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
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item">Patients</li>
                                <li class="breadcrumb-item active">Add</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Edit Radiography Case</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="radio_departments_list"><button class="btn btn-default hidden-xs ml-2">Manage
                                    List</button></a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>
                            <!-- <form name="myForm" id="myForm" method="post"> -->
                            <form name="myForm" id="myForm" method="post" class="form mt-5">
                                <div class="body">
                                    <div class="row clearfix">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" id="sample"
                                                    value="<?= $app->stringFormat($data['sample'], 40); ?>"
                                                    class="form-control" name="sample" placeholder="Sample Name"
                                                    required>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $get_staff_id; ?>" id="postid"
                                            name="postid">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $data['amount']; ?>"
                                                    id="amount" name="amount" placeholder="Amount" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="description"
                                                    name="description" placeholder="Description">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick" id="account_type"
                                                    name="account_type">
                                                    <option value="0">Select Department</option>
                                                    <?php

                                                    $fetch_hmo = $app->fetch_query($radio_departments_sql);
                                                    $sn = 1;
                                                    foreach ($fetch_hmo as $data) {
                                                        ?>
                                                        <option value="<?php echo ($data['DepartmentID']); ?>">
                                                            <?php echo ($data['DepartmentName']); ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="reset-btn" class="btn btn-primary">Update
                                                        Case</button>
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

            $("#myForm").on('submit', (function (e) {
                e.preventDefault();
                var btn = $("#reset-btn");
                btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                var datas = new FormData(this);
                $.ajax({
                    url: "ajax/update_radio_test",
                    type: "post",
                    data: datas,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {


                        if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: " Radiography Test Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: data,
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