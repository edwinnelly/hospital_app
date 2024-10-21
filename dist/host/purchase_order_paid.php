<?php
include "config/checkers.php";
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>EMR :: POS Drug List paid</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
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


        <?php
        include "inc/nav.php";
        include "inc/header.php";
        include "inc/rightside.php";
        ?>

        <!-- Main Content -->
        <div class="body_area after_bg">

            <div class="block-header">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item">Drug</li>
                                <li class="breadcrumb-item active">List</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Purchase Order / Paid</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="purchase_order.php"><button class="btn btn-secondary hidden-xs">Purchase
                                    Order</button></a>
                            <!-- <a><button class="btn btn-secondary hidden-xs bill_account">Send To Account
                                </button></a> -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable mb-0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="c_checkbox">
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Drug Name</th>
                                                <th>Amount</th>
                                                <th>Created On</th>
                                                <th>PO Date</th>
                                                <th>Batch Id</th>
                                                <th>Quantity</th>
                                                <th>Payment</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $fetch_query = $app->fetch_query($paid_purchase_order_sql);
                                            // Create for each employee loop in php
                                            $count = 1;
                                            foreach ($fetch_query as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td class="width45">
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td class="">
                                                        <?php echo $value['drugs_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['amount']; ?>
                                                    </td>
                                                    <td><span>
                                                            <?php echo $value['created_on']; ?>
                                                        </span></td>
                                                    <td>
                                                        <?php echo $value['choosen_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['batch_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['qty']; ?>
                                                    </td>
                                                    <td>
                                                        <span class="text-danger">
                                                            <?php
                                                            if ($value['send_to_account'] == 'no') {
                                                                echo 'New';
                                                            } elseif ($value['send_to_account'] == 'yes') {
                                                                echo 'Pending';
                                                            } else {
                                                                echo 'Paid';
                                                            }

                                                            ?>
                                                        </span>
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

                <?php
                include "inc/footer.php";
                ?>
            </div>

        </div>

        <!-- Default Size -->

    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete_order_btn', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const drug_name = $(this).attr("data-drug_name");

            // show in text field
            $("#drug_name").val(drug_name);
            $("#id").val(id);

            //call  modal
            $('#delete_order').modal('show');

            $("#delete_order_btn").click(function () {
                const drug_name = $("#drug_name").val();
                const id_del = $("#id").val();

                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                //validate
                //call Ajax
                if (id_del === '' || id_del === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/delete_order_purchase",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function (data) {
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Purchase Order Deleted, Please wait redirecting...!",
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

        });


        $(document).on('click', '.bill_account', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const drug_name = $(this).attr("data-drug_name");

            // show in text field
            $("#drug_name").val(drug_name);
            $("#id").val(id);

            //call  modal
            $('#bill_accounts').modal('show');

            $("#account_pos").click(function () {

                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

                $.ajax({
                    url: "ajax/send_purchase_order_to_account",
                    method: "POST",
                    data: {

                    },
                    success: function (data) {
                        if (data.trim() == 'success') {

                            //hide  modal
                            $('#bill_accounts').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Purchase Order Sent To Account For Approval, Please wait redirecting...!",
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



<div class="modal fade" id="delete_order" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Order</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="drug_name" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect text-default" id="delete_order_btn"
                    data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bill_accounts" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Continue with transactions</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <!-- <input type="text" class="form-control" id="drug_name" readonly> -->
                        <h6>Please Not this bill will be sent to account office for approval</h6>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary btn-simple waves-effect text-default" id="account_pos"
                    data-dismiss="modal">Send to account</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Account</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emp_name" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Account</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emp_name" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>