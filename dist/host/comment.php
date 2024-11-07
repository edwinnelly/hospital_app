<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));
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
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
    <style>
    .custom-textarea {
    width: 100%; /* Makes the textarea take the full width of its container */
    max-width: 600px; /* Maximum width */
    height: 150px; /* Fixed height */
    padding: 10px; /* Adds padding inside the textarea */
    font-family: Arial, sans-serif; /* Font family */
    font-size: 16px; /* Font size */
    line-height: 1.5; /* Line height for better readability */
    color: #333; /* Text color */
    background-color: #f9f9f9; /* Background color */
    border: 1px solid #ccc; /* Border styling */
    border-radius: 5px; /* Rounded corners */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    resize: vertical; /* Allow vertical resizing only */
    outline: none; /* Removes the default outline */
    transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition for border and shadow */
}

.custom-textarea:focus {
    border-color: #66afe9; /* Border color when focused */
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6); /* Box shadow when focused */
}

.custom-textarea::placeholder {
    color: #999; /* Placeholder text color */
    opacity: 1; /* Ensures consistent placeholder opacity across browsers */
}

</style>
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
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Comment</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-warning hidden-xs ml-2" data-toggle="modal" data-target="#addPrescription" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Create Comment</button>

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
                                    <p class="social-icon">
                                        <a class="px-2" title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                        <a class="px-2" title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                                        <a class="px-2" title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                        <a class="px-2" title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                                        <a class="px-2" title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                                    </p>
                                    <div class="mt-2">
                                        <a href="patient_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ=="><button
                                                class="btn btn-sm btn-primary" style="color:white">My Profile</button></a>
                                        <button class="btn btn-sm btn-default">Message</button>
                                    </div>
                                </div>
                            </div>


                            <div id="notificationContainer" style="width:500px"></div>

                            <div class="container">
                                <div class="row clearfix">


                                    <div class="col-lg-10 col-md-12">
                                        <div class="card taskboard">
                                            <div class="header">
                                                <h2>New</h2>
                                                <ul class="header-dropdown">
                                                    <li><span class="badge badge-primary"></span></li>
                                                </ul>
                                            </div>
                                            <div class="body planned_task">
                                                <div class="dd" data-plugin="nestable">
                                                    <ol class="dd-list">
                                                        <?php
                                                        $fetch_user = "SELECT 
                comment.report_info,
                comment.doc_id,
                comment.id,
                comment.created_at,
                staffs_accounts.firstname, 
                staffs_accounts.lastname,
                staffs_accounts.photo,
                patient_data.patient_name,
                patient_data.photo as patient_photo
            FROM 
            comment 
            LEFT JOIN 
                staffs_accounts 
            ON 
           comment.doc_id = staffs_accounts.staff_id left join patient_data on comment.pid = patient_data.pid where comment.pid='$get_staff_id' order by comment.id desc  ";
                                                        $fetch_user = $app->fetch_query($fetch_user);
                                                        foreach ($fetch_user as $fetch_users) {
                                                            $fetch_user_id = $fetch_users['id'];
                                                            // $fetch_user_name = $fetch_users['name'];    
                                                        ?>
                                                            <li class="dd-item" data-id="1">
                                                                <div class="dd-handle d-flex justify-content-between align-items-center">
                                                                    <span style="text-transform:capitalize"><?php echo $fetch_users['firstname']; ?> <?php echo $fetch_users['lastname']; ?></span>
                                                                    <span><?php echo $fetch_users['created_at']; ?></span>
                                                                    <div class="action">

                                                                        <button type="button" class="btn btn-sm" title="Time"><i
                                                                                class="icon-clock"></i></button>


                                                                        <button type="button" class="btn btn-sm delete_emp" title="Delete" data-id="<?php echo $fetch_users['id']; ?>"><i
                                                                                class="icon-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="dd-content mt-3">


                                                                    <p> <?php echo nl2br($fetch_users['report_info']); ?></p>
                                                                    <ul class="list-unstyled team-info mt-3 mb-3">


                                                                        <li><img class="avatar xs" src="../profile_pic/<?php echo $fetch_users['photo']; ?>"
                                                                                title="<?php echo $fetch_users['firstname']; ?> <?php echo $fetch_users['lastname']; ?>" alt="Avatar"></li>
                                                                        <li><img class="avatar xs" src="../profile_pic/<?php echo $fetch_users['patient_photo']; ?>"
                                                                                title="<?php echo $fetch_users['patient_name']; ?>" alt="Avatar"></li>
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
                let category_name = document.forms["myForm"]["summary"].value;
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
                    var btn = $("#reset-btns");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_comment",
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
                                    var btn = $("#reset-btsn");
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
            // const emp_name = $(this).attr("data-emp_name");

            // show in text field
            // $("#emp_name").val(emp_name);
            $("#ids").val(id);

            //call  modal
            $('#newmodal').modal('show');

            $("#delete_emp").click(function() {
                // const emp_name_del = $("#emp_name").val();
                const id_del = $("#ids").val();

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
                        url: "ajax/delete_comment",
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


<div class="modal fade" id="newmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete This Summary?</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <input type="text" class="form-control" id="emp_name" readonly> -->
                        <input type="hidden" class="form-control" id="ids">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    >Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-bs-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPrescription" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">New Comment</h5>
            </div>
            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <label for="emp_name">Appointment Title</label> -->
                            <div class="col-sm-12">
                                <textarea name="summary" id="summary" cols="30" rows="10" class="custom-textarea"></textarea>

                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $get_staff_id;  ?>" id="pid" name="pid">
                            <input type="hidden" class="form-control" value="<?php echo $staff_ids;  ?>" id="did" name="did">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-simple waves-effect text-white" value="Create Comment" id="reset-btns">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
            </form>
        </div>
    </div>
</div>