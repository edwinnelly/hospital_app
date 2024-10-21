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

    <title>EMR :: POS Drug List</title>
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
                            <h1 class="mb-1 mt-1">Purchase Order Manager</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="purchase_order_paid.php"><button class="btn btn-secondary hidden-xs">Paid</button></a>
                            <a href="purchase_order_unpaid.php"><button class="btn btn-secondary hidden-xs">Unpaid</button></a>
                           
                            <a href="purchase_order_completed.php"><button class="btn btn-secondary hidden-xs">Update
                                    Stock</button></a>
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
                                                <th>Drug class</th>
                                                <th>Brands</th>
                                                <th>Batches</th>
                                                <th>Suppliers</th>
                                                <th>Quantity</th>

                                                <th>Cost price</th>
                                                <th>Selling price</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $fetch_query = $app->fetch_query($drug_lists_sql);
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
                                                        <?php echo $value['category_name']; ?>
                                                    </td>
                                                    <td><span>
                                                            <?php echo $value['brandname']; ?>
                                                        </span></td>
                                                    <td>
                                                        <?php echo $value['batch_no']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['supplier']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['qty']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['cost_price']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['selling_price']; ?>
                                                    </td>


                                                    <td>

                                                        <div class="dropdown show">
                                                            <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <a class="dropdown-item" href="purchase_new.php?fid=<?php echo $value['id']; ?>&&st=<?php echo base64_encode($app->stringFormat($value['drugs_name'], 20)); ?>
                                                                ">New Order</a>

                                                                <a class="dropdown-item" href=" ">View History</a>




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
        $(document).on('click', '.delete_emp', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-emp_name");

            // show in text field
            $("#emp_name").val(emp_name);
            $("#id").val(id);

            //call  modal
            $('#defaultModal').modal('show');

            $("#delete_emp").click(function () {
                const emp_name_del = $("#emp_name").val();
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
                        url: "ajax/delete_patient",
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
                                    text: "Account Deleted, Please wait redirecting...!",
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
    </script>
</body>

</html>

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