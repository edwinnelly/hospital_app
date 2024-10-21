<?php
include "config/checkers.php";
//sql command
$fetch_emp = $app->fetch_query($drug_supplier_sql);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>EMR :: Drug Supplier</title>
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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item">Supplier</li>
                                <li class="breadcrumb-item active">List</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Drug Supplier List</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="supplier_add.php"><button class="btn btn-secondary hidden-xs">Add
                            Supplier</button></a>
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
                                                <th>Name</th>
                                                <th>Supplier ID</th>
                                                <th>Phone</th>
                                                <th>Join Date</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Create for each employee loop in php
                                            $count = 1;
                                            foreach($fetch_emp as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td class="width45">
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td class="d-flex">
                                                       <div class="ml-2">
                                                            <h6 class="mb-0" style="text-transform: capitalize;">
                                                                
                                                                <?php echo $app->stringFormat($value['supplier'],29); ?>
                                                            </h6>
                                                            <span class="text-muted">

                                                                <?php echo $app->stringFormat($value['email_address'],30); ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><span>SP-00<?php echo $value['id']; ?>

                                                        </span></td>
                                                    <td><span>
                                                            <?php echo $value['phone']; ?>
                                                        </span></td>
                                                    <td>
                                                        <?php echo $value['date_cr']; ?>
                                                    </td>
                                                    <td>
                                                        
                                                        <?php echo $app->stringFormat($value['email'],30); ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $app->stringFormat($value['addr'],20); ?>
                                                       
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="supplier_edit.php?fid=<?php echo $value['id']; ?>&&st=<?php echo base64_encode($value['supplier']); ?>
                                                                "><button type="button"
                                                                class="btn btn-sm btn-default"><i
                                                                    class="zmdi zmdi-edit"></i></button></a>
                                                        <button type="button" class="btn btn-sm btn-default"><i
                                                                class="zmdi zmdi-delete delete_emp"
                                                                data-id="<?= $value['staff_id']; ?>"
                                                                data-emp_name="<?php echo htmlentities($value['supplier']); ?>"></i></button>
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
                        url: "ajax/delete_emp",
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