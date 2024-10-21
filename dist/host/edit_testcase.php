<?php
include "config/checkers.php";
 $cat_name = base64_decode($app->get_request('cat_name'));
 $cat_fid =(int) base64_decode($app->get_request('fid'));
//fetch the category
$sqls = "SELECT lab_test_case.id,lab_test_case.restrictions,lab_test_case.container,lab_test_case.sample,lab_test_case.tat,lab_test_case.created_date,lab_test_case.test_price as amount, lab_test_case.test_name, lab_test_case.test_price, department.department_name, lab_kit_samples.kit_name as sample_kit_name, lab_kit_containers.kit_name as container_kit_name, lab_kit_restrictions.kit_name as restrictions_kit_name FROM lab_test_case LEFT JOIN department ON department.id = lab_test_case.dpt LEFT JOIN lab_kit AS lab_kit_samples ON lab_kit_samples.id = lab_test_case.sample LEFT JOIN lab_kit AS lab_kit_containers ON lab_kit_containers.id = lab_test_case.container LEFT JOIN lab_kit AS lab_kit_restrictions ON lab_kit_restrictions.id = lab_test_case.restrictions where lab_test_case.id=$cat_fid";
$lab_test=$app->fetch_query($sqls);
foreach ($lab_test as $test);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:Edit Test Case</title>
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
                                <li class="breadcrumb-item">Test Case</li>
                                <li class="breadcrumb-item active">Update</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Edit Test Case</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="lab_setup"><button class="btn btn-default hidden-xs ml-2">Manage Test</button></a>
                            <!-- <button class="btn btn-secondary hidden-xs ml-2">Department</button> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>
                            <form name="myForm" id="myForm" method="post">
                                <form name="myForm" id="myForm" method="post" class="form mt-5">
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Test Name</label>
                                                    <input type="text" id="test_name" class="form-control"
                                                        name="test_name" placeholder="Name Of test" required value="<?= $test['test_name']; ?>">
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?= $test['id']; ?>" name="fid">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Test Price</label>
                                                    <input type="text" id="test_price" class="form-control"
                                                        name="test_price" placeholder="Test Price" required value="<?= $test['amount']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Turn Around Time</label>
                                                    <input type="number" id="tat" class="form-control"
                                                        name="tat" placeholder="Turn Around Time" required value="<?= $test['tat']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                <label> Department</label>
                                                    <select class="form-control show-tick" id="dpt" name="dpt">
                                                        <option value="<?= $test['id']; ?>">Select Department</option>
                                                        <?php
                                                        $sql = "select * from department";
                                                        $dpt = $app->fetch_query($sql);
                                                        foreach ($dpt as $department) {
                                                            
                                                        ?>
                                                        <option value="<?=  $department['id']; ?>"><?=  $department['department_name']; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                <label> Choose Sample</label>
                                                    <select class="form-control show-tick" id="sample" name="sample">
                                                        <option value="<?= $test['sample']; ?>">Select Sample</option>
                                                        <?php
                                                        $fetch_sample = $app->fetch_query($kit_sample_sql);
                                                        foreach ($fetch_sample as $sample) {
                                                        ?>
                                                        <option value="<?=  $sample['id']; ?>"><?=  $sample['kit_name']; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                <label> Choose container</label>
                                                    <select class="form-control show-tick" id="container" name="container">
                                                        <option value="<?= $test['container']; ?>">Select container</option>
                                                        <?php
                                                        $fetch_kit_containers = $app->fetch_query($kit_containers_sql);
                                                        foreach ($fetch_kit_containers as $container) {
                                                        ?>
                                                        <option value="<?=  $container['id']; ?>"><?=  $container['kit_name']; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                <label> Choose restrictions</label>
                                                    <select class="form-control show-tick" id="restrictions" name="restrictions">
                                                        <option value="<?= $test['restrictions'];  ?>">Select restrictions</option>
                                                        <?php
                                                        $fetch_kit_Restrictions = $app->fetch_query($kit_Restrictions_sql);
                                                        foreach ($fetch_kit_Restrictions as $restrictions) {
                                                        ?>
                                                        <option value="<?=  $restrictions['id']; ?>"><?=  $restrictions['kit_name']; ?></option>

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
                                                        Test</button>
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
            function validateForm() {
                let test_name = document.forms["myForm"]["test_name"].value;
                let test_price = document.forms["myForm"]["test_price"].value;

                if (test_name === "") {
                    Swal.fire({
                        title: "The Test Case Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }if (test_name.length < 3) {
                    Swal.fire({
                        title: "Error!",
                        text: "Test Name must be at least 4 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/updated_test_case",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Test case Updated, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html("Test Case Updated!");
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
                } else {

                }

            }));

        });
    </script>
</body>

</html>