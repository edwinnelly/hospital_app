<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$get_staff_name = $app->get_request('st');
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data);

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
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Add New Test</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-default hidden-xs ml-2" id="hmopay" data-hmoid="<?php echo $get_staff_id;  ?>">Use HMO </button></div>
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
                                    <h5 class="mt-0 mb-0"><strong>
                                            <?php echo $data['patient_name']; ?>
                                        </strong></h5>
                                    <span class="text-muted font-13">
                                        <?php echo htmlspecialchars($data['hmo_name']); ?>
                                    </span>
                                    <p class="mb-1">
                                        <?php echo htmlspecialchars($data['address']); ?>
                                    </p>
                                    <p class="mb-1">Wallet 
                                    ₦<?php echo number_format($data['wallet']); ?> 
                                    </p>
                                </div>
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
                                                                            class="zmdi zmdi-plus addtest"
                                                                            data-id="<?php echo $fetch_dpt['id']; ?>"
                                                                            data-pid="<?php echo $get_staff_id; ?>"
                                                                            data-spid="<?php echo $id; ?>"
                                                                            data-dpt="<?php echo $fetch_dpt['radio_dpt']; ?>"
                                                                            data-amount="<?=  ($fetch_dpt['amount']); ?>"></i></button>

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
                                                <h6>New Lab Test</h6>
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
                                                        $sql = "SELECT patient_test_radio.*,radio_graphy_test.sample from patient_test_radio,radio_graphy_test WHERE patient_test_radio.test_id=radio_graphy_test.id and  patient_test_radio.status=0 and patient_test_radio.patient_id=$get_staff_id";
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
                                                        <tr>
                                                            <td colspan="1" align="right"></td>
                                                            <td style="font-weight: bold;">Total ₦<?php

                                //  ----------------------------------------------------------------
                                // Process the total count of test and sum the result
                                $sum_test_result = "SELECT SUM(amount) as amount from patient_test_radio where patient_id=$get_staff_id and status=0";
                                $result = $app->fetch_query($sum_test_result);
                                foreach($result as $amount);
                                if($amount['amount']==''){
                                echo "0";
                                }else{
                                    echo number_format($amount['amount']);
                                }
?></td>
                                                            <td>
                                                            <?php
                                                                if($amount['amount']>1){
                                                                   

                                                                    echo "<button class='btn btn-secondary hidden-xs ml-2 account' data-pids='$get_staff_id'>Send To Account</button>";
                                                                    echo "<button class='btn btn-secondary hidden-xs ml-2 wallets' data-pids='$get_staff_id' data-amt='0' data-wallet='0' data-cds='$staff_ids'>Use Wallet</button>";
                                                                }
                                                                ?>
                                                           
                                                            
                                                            </td>
                                                        </tr>
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
            const id = $(this).attr("data-id");
            const pid = $(this).attr("data-pid");
            const spid = $(this).attr("data-spid");
            const amount = $(this).attr("data-amount");
            const dpt = $(this).attr("data-dpt");
            //disable the button
            const btn = $("#addtest");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Adding...');

            if (id === '' || id === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });
                const btn = $("#addtest");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {
                
                $.ajax({
                    url: "ajax/send_patient_test_radio",
                    method: "POST",
                    data: {
                        id: id, pid: pid, spid: spid, amount: amount,dpt:dpt
                    },
                   
                    success: function (data) {
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#defaultModal').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Test Added, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        });


        //send payment to account model
        $(document).on('click', '.account', function () {
            //fetch data from data attribute
            const pid_account = $(this).attr("data-pids");
           
            //disable the button
            const btn = $("#addtest");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Adding...');

            if (pid_account === '' || pid_account === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });
                const btn = $("#addtest");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {
                $.ajax({
                    url: "ajax/test_to_account_dpt_radio",
                    method: "POST",
                    data: {
                        pid_account: pid_account
                    },
                    success: function (data) {
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#defaultModal').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Bills Has Been Sent To Account Department, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            }
        });
        //send payment to wallets model
        $(document).on('click', '.wallets', function () {
            //fetch data from data attribute
            const pid_account = $(this).attr("data-pids");
            const amt = $(this).attr("data-amt");
            const wallet = $(this).attr("data-wallet");
            const cds = $(this).attr("data-cds");
           
            //disable the button
            const btn = $("#wallets");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Adding...');

            if (pid_account === '' || pid_account === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });

                const btn = $("#wallets");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {

                $.ajax({
                    url: "ajax/pay_radio_test_wallet",
                    method: "POST",
                    data: {
                        pid_account: pid_account,amt:amt,wallet:wallet,cds:cds
                    },
                    success: function (data) {
                        
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#defaultModal').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Payment Completed From Patient Wallet, Please wait redirecting...!",
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        }else{
                            Swal.fire({
                                title: "Error!",
                                text: "Please top up account to continue, Please wait redirecting...!",
                                icon: "error",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
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
                    url: "ajax/delete_patient_test_radio",
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

<script>
        $(document).on('click', '#hmopay', function () {
            //fetch data from data attribute
        
            //call  modal
            $('#defaultModal_hmo').modal('show');

            $("#pay_with_hmo").click(function () {
                
                const id_del_hmo = $("#hmopostid").val();
                // alert(id_del_hmo);

                //disable the button
                const btn = $("#pay_with_hmo");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
               
                $.ajax({
                        url: "ajax/hmo_radio_payments",
                        method: "POST",
                        data: {
                            id_del_hmo: id_del_hmo
                        },
                        success: function (data) {
                           
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal_hmo').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Payment completed, Please wait redirecting...!",
                                    icon: "success",
                                });

                                setTimeout(function () {
                                    location.reload();
                                }, 3000);


                            }
                        }
                    });
            });

        });
    </script>
</body>

</html>

<div class="modal fade" id="defaultModal_hmo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Payment is fully automated by HMO portal</h6>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" style="color:red">Please not this action is permanent!</label>
                        <input type="hidden" class="form-control" value="<?php echo $get_staff_id;  ?>" id="hmopostid">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="pay_with_hmo"
                    data-dismiss="modal" style="color:white">Continue</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>