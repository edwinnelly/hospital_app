<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$get_staff_name = $app->get_request('st');
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
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

    <title>EMR :: Patient List</title>
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
                        <div class="col-lg-8 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item">Patients</li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Patients Case Note</h1>
                            <div class="bh_divider"></div>
                            <div class="row clearfix">

                                <div class="col-12">
                                    <ul class="nav nav-tabs">

                                        <li class="nav-item"><a class="nav-link active"
                                                href="addEcounterClerking.php?fid=<?php echo base64_encode($get_staff_id); ?>&&st=<?php echo base64_encode($get_staff_id); ?>">Encounters</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Vitals</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Drug administration</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Fluid Chart</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Nursing Remark</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Surgical note</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Results</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Immunizations</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Bills</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Discharge summary</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Referral</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Medical Report</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Attachment</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Comments</a></li>
                                    </ul>
                                </div>




                            </div>
                        </div>

                    </div>
                </div>
            </div>






            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">

                                <div id="notificationContainer" style="width:500px"></div>
                                <hr>

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



                                <div class="table-responsive">

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