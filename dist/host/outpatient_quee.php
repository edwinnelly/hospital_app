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
    <title>:: Maxsomeware :: outpatient</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
</head>

<body class="font-ubuntu h_menu">

    <div id="body" class="theme-blue">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="mt-3"><img class="zmdi-hc-spin w60" src="../assets/images/loader.svg" alt="Amaze"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <div class="overlay"></div>

        <!-- Top Bar -->

        <?php
        include "inc/nav.php";
        include "inc/header.php";
        // include "inc/rightside.php";
        ?>
        <!-- Right Sidebar -->

        <!-- Main Content -->
        <div class="body_area after_bg">

            <div class="container">
                <br>
                <div class="row clearfix row-deck">
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="card activities">
                            <div class="header">
                                <h2><strong>Outpatient Activities</strong> <small>Manage Outpatient Account Activities
                                        Here</small></h2>
                            </div>
                            <div class="body">
                            <ul class="list-unstyled activity mb-0">
                                    <li>
                                        <a href="outpatient">
                                            <i class="zmdi zmdi-file bg-blue"></i>
                                            <div class="info">
                                                <h4>My Queue</h4>
                                                <small>Manage My Queue Request here</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="outpatient_quee">
                                            <i class="zmdi zmdi-file-text bg-red"></i>
                                            <div class="info">
                                                <h4>All Queue</h4>
                                                <small>Manage All Queue here</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="outpatient_quee_specialist">
                                            <i class="zmdi zmdi-file-text bg-red"></i>
                                            <div class="info">
                                                <h4>Specialist Queue</h4>
                                                <small>Manage Specialist Queue here</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="outpatient_history">
                                            <i class="zmdi zmdi-file-text bg-red"></i>
                                            <div class="info">
                                                <h4> Outpatient History</h4>
                                                <small>Manage  Queue History</small>
                                            </div>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Manage All Queue  </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable mb-0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    SN
                                                </th>
                                                <th>Patient Names</th>
                                                <th>Age/Sex</th>
                                                <th>Specialty</th>
                                                <th>Doctor</th>
                                                <th>Folder status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //get today date
                                            $today = date("Y-m-d");


                                            $sql_outpatient = "SELECT 
    a.tittle, 
    a.doc_id, 
    a.id, 
    a.description, 
    a.appointment_date, 
    a.status, 
    s.firstname, 
    s.lastname, 
    s.sex, 
    s.photo AS staff_photo, 
    p.photo AS patient_photo, 
    p.pid, 
    spe.specializations_name, 
    p.patient_name 
FROM 
    appointment a 
LEFT JOIN 
    staffs_accounts s ON a.doc_id = s.staff_id 
LEFT JOIN 
    patient_data p ON a.pid = p.pid 
LEFT JOIN 
    specializations spe ON a.specialist_id = spe.id 
WHERE 
    a.status = '0' 
    AND DATE(a.appointment_date) = '$today';
 ";
                                            $fetch_query = $app->fetch_query($sql_outpatient);
                                            // Create for each employee loop in php
                                            $count = 1;
                                            foreach ($fetch_query as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td class="width45">
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td class="d-flex">

                                                        <div class="ml-2">
                                                            <h6 class="mb-0" style="text-transform: capitalize;">
                                                                <?php echo $app->stringFormat($value['patient_name'], 20); ?>

                                                            </h6>
                                                            <span class="text-muted">
                                                                PID-<?php echo $value['pid']; ?>
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td><span>
                                                            <?php echo $value['sex']; ?>
                                                        </span></td>
                                                    <td><span>
                                                            <?php echo $value['specializations_name']; ?>
                                                        </span></td>
                                                    <td><span> <?php echo $app->stringFormat($value['firstname'], 20); ?>
                                                            <?php echo $app->stringFormat($value['lastname'], 20); ?>
                                                        </span></td>

                                                    <td>
                                                        <label for="">
                                                            <?php
                                                            if ($value['status'] == 0) {

                                                                echo "Open";
                                                            } else {
                                                                echo "Closed";
                                                            }

                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <a class="dropdown-item" href="patient_profile.php?fid=<?php echo $value['pid']; ?>&&st=<?php echo base64_encode($app->stringFormat($value['patient_name'], 20)); ?>
                                                                ">Open Folder</a>

                                                                <a class="dropdown-item delete_emp" style="cursor: pointer;" data-id="<?= $value['id']; ?>"
                                                                    data-emp_name="<?php echo ($value['patient_name']); ?>">Close Folder</a>

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
                        url: "ajax/close_folder_appointment",
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
                                    text: "Folder closed, Please wait redirecting...!",
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
                <h5 class="title" id="defaultModalLabel">Do You Want To Close File ?</h5>
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
                    data-dismiss="modal">Yes, Close File</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>