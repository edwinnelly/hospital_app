<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$get_staff_name = base64_decode($app->get_request('st'));

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Appointment">

    <title>Manage admission</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu h_menu">

    <div id="body" class="theme-blue">
        <!-- Page Loader -->


        <div class="overlay"></div>
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
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item">Users</li>
                                <li class="breadcrumb-item active">Bookings</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Manage / Admission</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ=="><button type="button" class="btn btn-sm" title="Time"><i class="icon-home" style="color:white"></i></button></a>
                            <button class="btn btn-secondary hidden-xs ml-2 addappoint"
                                data-id="<?php echo $get_staff_id; ?>">Create Admission</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <?php
                include "component/patient_profile_header.php";
                ?>
                <div class="row clearfix">


                    <div class="col-lg-8 col-md-12">
                        <div class="card taskboard">
                            <div class="header">
                                <h2>New</h2>
                                <ul class="header-dropdown">
                                    <li><span class="badge badge-primary"> </span></li>
                                </ul>
                            </div>
                            <div class="body planned_task">
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        <?php
                                        $fetch_user1 = "SELECT admission.tittle, admission.doc_id, admission.id, admission.description, admission.appointment_date, staffs_accounts.firstname, staffs_accounts.lastname, staffs_accounts.photo, patient_data.photo AS patient_photo, wards.ward_name FROM admission LEFT JOIN staffs_accounts ON admission.doc_id = staffs_accounts.staff_id LEFT JOIN patient_data ON admission.pid = patient_data.pid LEFT JOIN wards ON admission.ward_id = wards.id WHERE admission.pid = '$get_staff_id'";
                                        $fetch_user = $app->fetch_query($fetch_user1);
                                        foreach ($fetch_user as $fetch_users) {
                                            $fetch_user_id = $fetch_users['id'];
                                            // $fetch_user_name = $fetch_users['name'];    
                                        ?>
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                    <span style="text-transform:capitalize"><?php echo $fetch_users['firstname']; ?> <?php echo $fetch_users['lastname']; ?></span>
                                                    <span><?php echo $fetch_users['appointment_date']; ?></span>
                                                    <div class="action">

                                                        <button type="button" class="btn btn-sm" title="Time"><i
                                                                class="icon-clock"></i></button>

                                                        <button type="button" class="btn btn-sm useappoint" data-postid="<?php echo $fetch_users['id']; ?>" title="Comment"><i
                                                                class="icon-bubbles"></i></button>

                                                        <button type="button" class="btn btn-sm delete_appoint" title="Delete" data-id="<?php echo $fetch_users['id']; ?>"><i
                                                                class="icon-trash"></i></button>
                                                    </div>
                                                </div>
                                                <div class="dd-content mt-3">
                                                    <h6><?php echo $fetch_users['tittle']; ?></h6>
                                                    <p> <?php echo $fetch_users['description']; ?></p>
                                                    <ul class="list-unstyled team-info mt-3 mb-3">


                                                        <li><img class="avatar xs" src="../profile_pic/<?php echo $fetch_users['photo']; ?>"
                                                                title="Avatar" alt="Avatar"></li>
                                                        <li><img class="avatar xs" src="../profile_pic/<?php echo $fetch_users['patient_photo']; ?>"
                                                                title="Avatar" alt="Avatar"></li>
                                                    </ul>
                                                </div>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>



        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
    <script src="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../assets/plugins/summernote/dist/summernote.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            function validateForm() {
                let tittle = document.forms["myForm"]["tittle"].value;
                let description = document.forms["myForm"]["description"].value;

                if (tittle === "") {
                    Swal.fire({
                        title: "The tittle  Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (description === "") {
                    Swal.fire({
                        title: "The description  Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (tittle.length < 5) {
                    Swal.fire({
                        title: "Error!",
                        text: "tittle must be at least 8 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            $(document).on('click', '.addappoint', function() {
                //fetch data from data attribute
                const id = $(this).attr("data-id");
                const emp_name = $(this).attr("data-emp_name");

                //hide  modal
                // show in text field
                $("#emp_name").val(emp_name);
                $("#id").val(id);

                //call  modal
                $('#defaultModal').modal('show');

                $("#myForm").on('submit', (function(e) {

                    validateForm();
                    let check = validateForm();
                    e.preventDefault();
                    if (check == true) {
                        var btn = $("#add");
                        btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                        var datas = new FormData(this);
                        $.ajax({
                            url: "ajax/add_admission",
                            type: "post",
                            data: datas,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: (data) => {
                                if (data.trim() == "success") {
                                    Swal.fire({
                                        title: "success!",
                                        text: "Admission Created, Please wait redirecting...!",
                                        icon: "success",
                                    });
                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);

                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: data,
                                        icon: "error",
                                    });
                                    var btn = $("#add");
                                    btn.attr('disabled', false).html();

                                }

                            },

                        });
                    } else {

                    }

                }));



            });



            // activate appointment
            $(document).on('click', '.useappoint', function() {
                //fetch data from data attribute
                const postid = $(this).attr("data-postid");

                $("#postid").val(postid);

                //call  modal
                $('#defaultModal_updates').modal('show');

                $("#myForms").on('submit', (function(e) {
                    e.preventDefault();
                    var btn = $("#addstatus");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_admission_update",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Admission Updated, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 3000);

                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: data,
                                    icon: "error",
                                });
                                var btn = $("#addstatus");
                                btn.attr('disabled', false).html();

                            }

                        },

                    });


                }));



            });



        });
    </script>
    <script>
        $(document).on('click', '.delete_appoint', function() {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            // show in text field

            $("#post_id").val(id);

            //call  modal
            $('#delete_appoint').modal('show');

            $("#delete_appoints").click(function() {

                const id_del = $("#post_id").val();


                //disable the button
                const btn = $("#delete_appoints");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                //validate
                //call Ajax
                if (id_del === '' || id_del === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#delete_appoints");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/delete_admission",
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
                                    text: "Admission Deleted, Please wait redirecting...!",
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
                <h5 class="title" id="defaultModalLabel">New Admission</h5>
            </div>
            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="emp_name"> Title</label>
                            <input type="text" class="form-control" name="tittle" id="tittle" required>
                            <input type="hidden" class="form-control" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <label for="emp_name"> Descriptions</label>
                            <input type="text" class="form-control" id="description" name="description" required>

                        </div>

                        <div class="form-group">
                            <label for="emp_name">Choose Specialist</label>
                            <select name="specialist" id="">
                                <option value="0">Choose Specialist</option>
                                <?php
                                $fetch_query = $app->fetch_query($specializations_sql);
                                foreach ($fetch_query as $key => $value) {
                                ?>

                                <?php
                                    echo "<option value='" . $value['id'] . "'>" . $value['specializations_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="emp_name">Choose Ward</label>
                            <select name="ward" id="">
                                <option value="0" disabled>Choose ward</option>
                                <?php
                                $fetch_query = $app->fetch_query($wards_sql);
                                foreach ($fetch_query as $key => $value) {
                                ?>
                                <?php
                                    echo "<option value='" . $value['id'] . "'>" . $value['ward_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="emp_name"> Room No / Bed No</label>
                            <input type="text" class="form-control" id="room" name="room" required>

                        </div>

                        <div class="form-group">
                            <p> <b>Choose Doctor</b> </p>
                            <select class="form-control z-index show-tick" name="docid"
                                data-live-search="true">
                                <option value="">Choose Doctor</option>
                                <?php
                                $services_hospital = $app->fetch_query($staff_details_sql);
                                foreach ($services_hospital as $services_hospitals) {
                                ?>
                                    <option value="<?= $services_hospitals['id']; ?>">
                                        <?= $app->stringFormat($services_hospitals['firstname'], 25); ?> <?= $app->stringFormat($services_hospitals['firstname'], 25); ?>
                                    </option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="emp_name">Admission Date / Time</label>
                            <input type="datetime-local" class="form-control" id="timer" name="timer" required>

                        </div>
                    </div>

            </div>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-success btn-simple waves-effect" id="add" data-dismiss="modal"
                    style="color:white">Add Appointment</button> -->
                <input type="submit" style="color:white" class="btn btn-success btn-simple waves-effect" id="add"
                    value="Admit Patient">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="defaultModal_updates" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Update Admission</h5>
            </div>
            <div class="modal-body">
                <form name="myForms" id="myForms" method="post">
                    <div class="col-md-9">
                        <div class="form-group">
                            <!-- <label for="emp_name">Appointment Option</label> -->
                            <select name="op" id="op" name="op">
                                <option value="1">In progress</option>
                                <option value="2">Discharge</option>
                            </select>
                            <input type="hidden" class="form-control" id="postid" name="postid">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-success btn-simple waves-effect" id="add" data-dismiss="modal"
                    style="color:white">Add Appointment</button> -->
                <input type="submit" style="color:white" class="btn btn-success btn-simple waves-effect" id="addstatus"
                    value="Update Admission">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="delete_appoint" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Admission</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="" value="Continue with the action" readonly>
                        <input type="hidden" class="form-control" id="post_id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_appoints"
                    data-dismiss="modal" style="color:white">Yes</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>