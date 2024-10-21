<?php
include "config/checkers.php";
$get_plan_id= base64_decode($app->get_request('fid'));
$get_hmo_id = base64_decode($app->get_request('flipid'));
$get_plan_name = base64_decode($app->get_request('cat_name'));
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Emr :: Radiography Setup </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu h_menu">

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
                                <li class="breadcrumb-item">Patient</li>
                                <li class="breadcrumb-item active">Radiography</li>
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;"><?=  $get_plan_name; ?> / RAD</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="hmo_profiling"><button class="btn btn-default hidden-xs ml-2">Use HMO </button></div></a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body d-flex">
                               
                            </div>


                            <div class="row clearfix row-deck">

                                <div class="col-lg-7">
                                    <div class="card">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <h6>Test Manager</h6>
                                                <table
                                                    class="table table-bordered table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">SN</th>
                                                            <th class="border-top-0">Test title</th>
                                                            <th class="border-top-0">Department</th>
                                                            <th class="border-top-0">Amount</th>

                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $fetch_dpt = $app->fetch_query($radio_test_list_sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $sn++; ?>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-0">
                                                                        <?= $app->stringFormat($fetch_dpt['sample'],25); ?>
                                                                    </h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-0">
                                                                        <?= $app->stringFormat($fetch_dpt['DepartmentName'], 20); ?>
                                                                    </h6>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-0">
                                                                    ₦<?= number_format($fetch_dpt['amount'],2); ?>
                                                                    </h6>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-default"><i
                                                                            class="zmdi zmdi-plus addtest" data-test_id_n="<?php echo $fetch_dpt['id']; ?>"  data-plan_id="<?php echo $get_plan_id; ?>" data-hmopass="<?php echo $get_hmo_id; ?>"></i>
                                                                        </button>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <h6>Allowed RAD Test</h6>
                                                <table
                                                    class="table table-bordered table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">SN</th>
                                                            <th class="border-top-0">Test title</th>
                                                            
                                                            <th class="border-top-0">Amount</th>

                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // $sql = "SELECT patient_test_radio.*,lab_test_case.test_name from patient_test_radio,lab_test_case,staffs_accounts WHERE patient_test_radio.test_id=lab_test_case.id and patient_test_radio.taken_by=staffs_accounts.id and patient_test_radio.patient_id=$get_staff_id and patient_test_radio.status=0";
                                                        $sql = "SELECT hmo_radio_group.*,radio_graphy_test.sample,radio_graphy_test.amount from hmo_radio_group,radio_graphy_test WHERE hmo_radio_group.case_id=radio_graphy_test.id and hmo_radio_group.profile_id=$get_plan_id and hmo_radio_group.hmo_id=$get_hmo_id";
                                                        $fetch_dpt = $app->fetch_query($sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $sn++; ?>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-0">
                                                                        <?= $app->stringFormat($fetch_dpt['sample'],20); ?>
                                                                    </h6>
                                                                </td>
                                                                
                                                                <td>
                                                                    <h6 class="mb-0">₦<?= number_format($fetch_dpt['amount'],2); ?>
                                                                    </h6>
                                                                </td>

                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-danger btn-rounded removetest" data-id_remove="<?php echo $fetch_dpt['id']; ?>">X<i
                                                                            class="zmdi zmdi-remove"
                                                                            ></i></button>
                                                                            
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

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

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.addtest', function () {
            
            //fetch data from data attribute
            const plan_id = $(this).attr("data-plan_id");
            const hmopass = $(this).attr("data-hmopass");
            const test_id_n = $(this).attr("data-test_id_n");
           
            //disable the button
            const btn = $("#addtest");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Adding...');

            if (plan_id === '' || plan_id === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });
                const btn = $("#addtest");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {
                
                $.ajax({
                    url: "ajax/add_hmo_plan_test",
                    method: "POST",
                    data: {
                        plan_id: plan_id, hmopass: hmopass, test_id_n: test_id_n
                    },
                    success: function (data) {
                    
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#defaultModal').modal('hide');
                            Swal.fire({
                                title: "success!",
                                text: "Test Added To Plan, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }else{
                            Swal.fire({
                                title: "Failed!",
                                text: "Failed to add test to plan, Please try again later...!",
                                icon: "error",
                            });
                            const btn = $("#addtest");
                            btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                        }
                    }
                });
            }
        });


        $(document).on('click', '.removetest', function () {
            //fetch data from data attribute
            const test_id = $(this).attr("data-id_remove");
            //disable the button
            const btn = $("#removetest");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Removed...');

            if (test_id === '' || test_id === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });
                const btn = $("#removetest");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {
                $.ajax({
                    url: "ajax/delete_hmo_plan",
                    method: "POST",
                    data: {
                        test_id: test_id
                    },
                    success: function (data) {
                        if (data.trim() == 'success') {
                            setTimeout(function () {
                                location.reload();
                            }, 100);
                        }
                    }
                });
            }
        });



    </script>


</body>

</html>
