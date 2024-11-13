<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));
$get_staff_name = $app->get_request('st');
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
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
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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
                                <!-- <li class="breadcrumb-item active">Lab</li> -->
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Referrals</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-warning hidden-xs ml-2" data-toggle="modal" data-target="#addPrescription" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Add Referrals</button>

                            <!-- <a href="add_patient_lab_profile.php?fid=<?php echo (int) $get_staff_id;  ?>"> <button class="btn btn-secondary hidden-xs ml-2">Add Test</button></a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="body d-flex">
                                <div class="profile-image mr-4">
                                    <img src="../profile_pic/<?php echo ($data['photo']);  ?>" class="w90 rounded-circle shadow" alt="" style="">

                                </div>
                                <div class="details">
                                    <h5 class="mt-0 mb-0"><strong><?php echo $data['patient_name'];  ?></strong></h5>
                                    <span class="text-muted font-13"><?php echo htmlspecialchars($data['hmo_name']);  ?></span>
                                    <p class="mb-1"><?php echo htmlspecialchars($data['address']);  ?></p>
                                    <a href="patient_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ=="><button
                                            class="btn btn-sm btn-primary" style="color:white">My Profile</button></a>
                                </div>
                            </div>


                            <div id="notificationContainer" style="width:500px"></div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="body">
                                        <div class="table-responsive">

                                            <table
                                                class="table table-bordered table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0">SN</th>
                                                        <th class="border-top-0">Diagnosis Suffered</th>
                                                        <th class="border-top-0">Reason For Referral</th>

                                                        <th class="border-top-0">Referring Condition</th>
                                                        <th class="border-top-0">Referred To</th>
                                                        <th class="border-top-0">Date</th>
                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT r.id, r.reason_referral, r.referring_condition, s.firstname,s.lastname, r.date, l.test_name FROM referral r JOIN lab_test_case l ON r.diagnosis_suffered = l.id JOIN staffs_accounts s ON r.referred_to = s.id WHERE r.patient_id = '$get_staff_id' ";
                                                    $fetch_dpt = $app->fetch_query($sql);
                                                    $sn = 1;
                                                    foreach ($fetch_dpt as $fetch) {

                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?= $sn++; ?>
                                                            </td>
                                                            <td>
                                                                <p class="">
                                                                    <?php echo $fetch['test_name'] ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="" style="text-transform:capitalize!important;">
                                                                    <?php echo html_entity_decode($fetch['reason_referral']); ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?= $fetch['referring_condition']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0" style="text-transform:capitalize;">
                                                                    <?= $fetch['firstname']; ?>  <?= $fetch['lastname']; ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">
                                                                <?= $fetch['date']; ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Action
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <!-- <li><a class="dropdown-item discontinue" style="cursor:pointer;" data-ids="<?php echo $fetch['id'] ?>">Change Diagnosis Status</a></li> -->
                                                                        <li><a class="dropdown-item delete_emp" href="#" data-emp_name="<?php echo $fetch['test_name'] ?>" data-id="<?php echo $fetch['id'] ?>">Delete Referrals</a></li>
                                                                    </ul>
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
                    </div>


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function validateForm() {
                let category_name = document.forms["myForm"]["referral_condition"].value;
                if (category_name === "") {
                    Swal.fire({
                        title: "Empty, Please Input Needed Field",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                return true; // Form is valid
            }

            $("#myForm").on('submit', function(e) {
                let check = validateForm();
                e.preventDefault();
                if (check) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing...");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_referral",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Created Successfully!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    var btn = $("#reset-btn");
                                    btn.attr("disabled", false).html("Created Successfully!");
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Error",
                                    icon: "error",
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        },
                    });
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete_emp', function() {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-emp_name");

            // show in text field
            $("#emp_name").val(emp_name);
            $("#id").val(id);

            //call  modal
            $('#newmodal').modal('show');

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
                        url: "ajax/delete_referral",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function(data) {
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal2').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Deleted, Please wait redirecting...!",
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
<div class="modal fade" id="addPrescription" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">New Referrals</h5>
            </div>
            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <div class="col-12">
                        <input type="hidden" name="doctor_id" id="" value="<?= $staff_ids ?>">
                        <input type="hidden" name="patient_id" id="" value="<?= $get_staff_id ?>">
                        <div class="form-group">
                            <p> <b>Diagnosis Suffered</b> </p>
                            <select class="form-control z-index show-tick" name="diagnosis"
                                data-live-search="true">
                                <option value="" disabled>Diagnosis Suffered</option>
                                <?php
                                $query = " select id, test_name from lab_test_case";
                                $services_hospital = $app->fetch_query($query);
                                foreach ($services_hospital as $services_hospitals) {
                                ?>
                                    <option value="<?= $services_hospitals['id']; ?>">
                                        <?= $services_hospitals['test_name'] ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>
                       
                        <div class="form-group">
                            <p> <b>Referred To</b> </p>
                            <select class="form-control z-index show-tick" name="referred_to"
                                data-live-search="true">
                                <option value="" disabled>Referred To</option>
                                <?php
                                $query = "select id, firstname, lastname from staffs_accounts where access_level_id = '1'";
                                $services_hospital = $app->fetch_query($query);
                                foreach ($services_hospital as $services_hospitals) {
                                ?>
                                    <option value="<?= $services_hospitals['id']; ?>" style="text-transform:capitalize;">
                                        <?= $services_hospitals['firstname'] ?> <?= $services_hospitals['lastname'] ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>
                     
                        <div class="form-group">
                            <label for="emp_name">Referring Condition</label>
                            <input type="text" class="form-control" name="referral_condition" placeholder="Referring Condition" required>

                        </div>
                        <div class="form-group">
                            <label for="emp_name">Reason for Referral</label>
                           <textarea id="" cols="30" name="reason_referral" class="form-control" placeholder="Reason For Referral"></textarea>

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" style="color:white" class="btn btn-success btn-simple waves-effect" id="reset-btn"
                    value="Add Referral">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="newmodal" tabindex="-1" role="dialog">
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
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-bs-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>