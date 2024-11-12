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

    <title>EMR :: Patient List</title>
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
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item">Patients</li>
                                <li class="breadcrumb-item active">List</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Patients Profile</h1>
                            <div class="bh_divider"></div>
                            <div class="row clearfix">


                                <div class="col-lg-12">
                                    <ul class="nav nav-tabs">

                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="">Patient Dashboard</a></li>

                                        <li class="nav-item"><a class="nav-link" href="patient_profile_case.php?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>
                                                                ">Case note</a></li>

                                        <li class="nav-item"><a class="nav-link"  href="diagnosis.php?fid=<?php echo base64_encode($get_staff_id); ?>&&st=<?php echo base64_encode($get_staff_id); ?>">Diagnosis
                                                History</a></li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="drug_administration?fid=<?php echo base64_encode($get_staff_id); ?>">Prescriptions</a></li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="patient_lab_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ==">Lab
                                                profile</a></li>

                                        <li class="nav-item"><a class="nav-link" href="patient_radiography_profile?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>">Imaging
                                                Profile</a></li>
                                        <li class="nav-item"><a class="nav-link"  href="fluid-chart?fid=<?php echo base64_encode($get_staff_id); ?>">Fluid Chart</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="">Patient
                                                bills</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="">Patient
                                                Alert</a></li>

                                        <li class="nav-item"><a class="nav-link" href="appointment.php?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>
                                                                ">Appointments</a></li>


                                        <li class="nav-item"><a class="nav-link" href="referrals.php?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>
                                                                ">Referrals</a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link"  href="medical_report?fid=<?php echo base64_encode($get_staff_id); ?>">Medical
                                                Reports</a></li>
                                        <li class="nav-item"><a class="nav-link"  href="comment?fid=<?php echo base64_encode($get_staff_id); ?>">Comment</a></li>

                                        <li class="nav-item"><a class="nav-link" href="discharge_summary.php?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>">Discharge
                                                Summary</a></li>

                                        <li class="nav-item"><a class="nav-link" href="admission.php?fid=<?php echo $get_staff_id; ?>&&st=<?php echo base64_encode(rand(13323, 3233939)); ?>">
                                                Adimission</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                href="">Attachments</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="">Seen</a></li>
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
                                <div class="card member-card">
                                    <div class="header bg-primary">
                                        <h4 class="mt-3 text-light"><?php echo $data['patient_name']; ?></h4>
                                    </div>
                                    <div class="member-img">
                                        <a href="" class="">
                                            <img src="../profile_pic/<?php echo ($data['photo']); ?>"
                                                class="rounded-circle" alt="profile-image">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="col-12">
                                            <ul class="social-links list-unstyled">
                                                <li><a title="facebook" href="javascript:void(0);"><i
                                                            class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="javascript:void(0);"><i
                                                            class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="javascript:void(0);"><i
                                                            class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted"><?php echo htmlspecialchars($data['address']); ?>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="row clearfix">
                                            <div class="col-4">
                                                <h5 class="mb-0">AI</h5>
                                                <small>Learning</small>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0"><?php echo ($data['hmo_name']); ?></h5>
                                                <small>HMO</small>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="mb-0">₦<?php echo number_format($data['wallet']); ?></h5>
                                                <small>Wallet</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>









                                <div class="col-lg-8 col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><strong>Badges</strong> <small>Add the badges component to any list
                                                    group item and it will automatically be positioned on the
                                                    right.</small> </h2>
                                            <ul class="header-dropdown">
                                                <li class="dropdown"> <a href="javascript:void(0);"
                                                        class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                        aria-haspopup="true" aria-expanded="false"> <i
                                                            class="zmdi zmdi-more"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                                <li class="remove">
                                                    <a role="button" class="boxs-close"><i
                                                            class="zmdi zmdi-close"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <ul class="list-group">
                                                <li class="list-group-item">Cras justo odio <span
                                                        class="badge badge-primary">14 new</span></li>
                                                <li class="list-group-item">Dapibus ac facilisis in <span
                                                        class="badge badge-success">99 read</span></li>
                                                <li class="list-group-item">Morbi leo risus <span
                                                        class="badge badge-danger">99+</span></li>
                                                <li class="list-group-item">Porta ac consectetur ac <span
                                                        class="badge badge-warning">21</span></li>
                                                <li class="list-group-item">Vestibulum at eros <span
                                                        class="badge badge-info">18</span></li>
                                            </ul>
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
        $(document).on('click', '.delete_emp', function() {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-emp_name");

            // show in text field
            $("#emp_name").val(emp_name);
            $("#id").val(id);

            //call  modal
            $('#defaultModal').modal('show');

            $("#delete_emp").click(function() {
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
                        success: function(data) {
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Account Deleted, Please wait redirecting...!",
                                    icon: "success",
                                });

                                setTimeout(function() {
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