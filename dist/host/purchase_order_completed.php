<?php
include "config/checkers.php";
//sum the order
$sum_order = $app->fetch_query($sum_purchase_new__account_sql);
foreach ($sum_order as $total_sum)
    ;
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>EMR :: POS Drug List unpaid</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu ">

    <div id="body" class="theme-blue">

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
                            <h1 class="mb-1 mt-1">Purchase Order / Completed / Restock</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="purchase_order.php"><button class="btn btn-secondary hidden-xs">Purchase
                                    Order</button></a>


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

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $fetch_query = $app->fetch_query($completed_purchase_order_sql);
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
                                                        <?php echo $value['pos_qty']; ?>
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
                                                    <td>

                                                        <div class="dropdown show">
                                                            <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <a class="dropdown-item bill_account" data-id="<?php if ($value['send_to_account'] == 'paid') {
                                                                } else {
                                                                    echo $value['id'];
                                                                } ?>" data-ids="<?php echo $value['id']; ?>"
                                                                    data-drug_name="<?php echo ($app->stringFormat($value['drugs_name'], 20)); ?>"
                                                                    data-postid="<?php echo $value['pid']; ?>"
                                                                    data-qty="<?php echo $value['qty'] + $value['pos_qty']; ?>"
                                                                    data-qty_new="<?php echo $value['pos_qty']; ?>">Restock
                                                                    Order</a>

                                                            </div>
                                                        </div>

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

        $(document).on('click', '.bill_account', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const drug_name = $(this).attr("data-drug_name");
            const qty = $(this).attr("data-qty");
            const qty_new = $(this).attr("data-qty_new");
            const postid = $(this).attr("data-postid");
            const ids = $(this).attr("data-ids");
            // show in text field
            $("#drug_name").val(drug_name);
            $("#id").val(id);
            $("#qty").val(qty);
            $("#qty_new").val(qty_new);
            $("#postid").val(postid);
            $("#ids").val(ids);

            //call  modal
            $('#bill_accounts').modal('show');
            $("#account_pos").click(function () {
                // const post_id = $("#id").val();
                const qty = $("#qty").val();
                const postid = $("#postid").val();
                const ids = $("#ids").val();

                //disable the button
                const btn = $("#account_pos");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

                $.ajax({
                    url: "ajax/updated_stocks",
                    method: "POST",
                    data: {
                        qty: qty, postid: postid,ids:ids
                    },
                    success: function (data) {
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#bill_accounts').modal('hide');
                            Swal.fire({
                                title: "success!",
                                text: "Stock updated, Please wait redirecting...!",
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



<div class="modal fade" id="bill_accounts" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Are You Sure ?</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="drug_name" readonly>
                        <hr>
                        <label for="">New Qty</label>
                        <input type="text" class="form-control" id="qty_new" readonly>
                        <input type="hidden" class="form-control" id="postid">
                        <input type="hidden" class="form-control" id="qty">
                        <input type="hidden" class="form-control" id="ids">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect text-default" id="account_pos"
                    data-dismiss="modal">Restock</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>