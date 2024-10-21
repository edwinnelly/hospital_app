<?php
include "config/checkers.php";
$fetch_dpt = $app->fetch_query($lab_test_list_sql);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Emr :: Lab Setup </title>
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
                                <li class="breadcrumb-item">Manage Data</li>
                                <li class="breadcrumb-item active">Lab Setup Mgt</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Lab Setup</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="add_testcase"><button class="btn btn-secondary hidden-xs">Add New
                            Test</button></a>
                            
                            <a href="custom_kit"><button class="btn btn-secondary hidden-xs">Custom
                            Test Kit</button></a>

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
                                    <table class="table table-bordered table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">SN</th>
                                                <th class="border-top-0">Test title</th>
                                                <th class="border-top-0">Department</th>
                                                <th class="border-top-0">Sample</th>
                                                <th class="border-top-0">Container</th>
                                                <th class="border-top-0">Restrictions</th>
                                                <th class="border-top-0">Creation Date</th>
                                                <th class="border-top-0">TAT</th>
                                                <th class="border-top-0">Amount</th>
                                                
                                                <th class="border-top-0">Unit</th>
                                                <th class="border-top-0">Reference Range</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sn = 1;
                                            foreach ($fetch_dpt as $fetch_dpt) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $sn++; ?>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?= $fetch_dpt['test_name']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?= $app->stringFormat($fetch_dpt['department_name'],20); ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?= $fetch_dpt['sample_kit_name']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?= $fetch_dpt['container_kit_name']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?= $fetch_dpt['restrictions_kit_name']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?php echo $fetch_dpt['created_date']; ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?php echo ($fetch_dpt['tat']); ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                            <?php echo number_format($fetch_dpt['amount']); ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                        <?php echo ($fetch_dpt['ranges_test']); ?> <?php echo ($fetch_dpt['unit']); ?>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">
                                                         <?php echo ($fetch_dpt['unit']); ?>
                                                        </h6>
                                                    </td>
                                                    
                                                   
                                                    <td>
                                                        <a
                                                            href="edit_testcase?fid=<?php echo base64_encode($fetch_dpt['id']); ?>&&cat_name=<?php echo base64_encode($fetch_dpt['test_name']); ?>"><button
                                                                type="button" class="btn btn-sm btn-default"><i
                                                                    class="zmdi zmdi-edit"></i></button></a>

                                                        <button type="button" class="btn btn-sm btn-default"><i
                                                                class="zmdi zmdi-delete delete_emp"
                                                                data-id="<?php echo  $fetch_dpt['id']; ?>"
                                                                data-dpt="<?php echo ($fetch_dpt['test_name']); ?>"></i></button>

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
            const emp_name = $(this).attr("data-dpt");

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
                        url: "ajax/delete_lab_test",
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
                                    text: "Lab Test Deleted, Please wait redirecting...!",
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
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Lab Test</h5>
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