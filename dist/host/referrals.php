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

    <title>Manage Referrals Note</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
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
                                <li class="breadcrumb-item active">Folder</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Referrals Note</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                        <a href="patient_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ=="><button type="button" class="btn btn-sm" title="Time"><i class="icon-home" style="color:white"></i></button></a>
                            <button class="btn btn-secondary hidden-xs ml-2 addappoint"
                                data-id="<?php echo $get_staff_id; ?>">Create Referrals</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                
            <?php   
            include"component/patient_profile_header.php";
                ?>


                <div class="row clearfix">


                    <div class="col-lg-10 col-md-12">
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
                                    $fetch_user = "SELECT 
                                    referrals.report_info,
                                    referrals.doc_id,
                                    referrals.id,
                                    referrals.created_date,
                                    staffs_accounts.firstname, 
                                    staffs_accounts.lastname,
                                    staffs_accounts.photo,
                                    patient_data.photo as patient_photo
                                FROM 
                                referrals 
                                LEFT JOIN 
                                    staffs_accounts 
                                ON 
                                referrals.doc_id = staffs_accounts.staff_id left join patient_data on referrals.pid = patient_data.pid where referrals.pid='$get_staff_id' order by referrals.id desc  ";
                                    $fetch_user = $app->fetch_query($fetch_user);
                                    foreach ($fetch_user as $fetch_users) {
                                        $fetch_user_id = $fetch_users['id'];    
                                        // $fetch_user_name = $fetch_users['name'];    
                                        ?>
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle d-flex justify-content-between align-items-center">
                                                <span style="text-transform:capitalize"><?php echo $fetch_users['firstname']; ?> <?php echo $fetch_users['lastname']; ?></span>
                                                <span><?php echo $fetch_users['created_date']; ?></span>
                                                <div class="action">
                                                    
                                                <button type="button" class="btn btn-sm" title="Time"><i
                                                            class="icon-clock"></i></button>


                                                    <button type="button" class="btn btn-sm delete_appoint" title="Delete" data-id_post="<?php echo $fetch_users['id']; ?>"><i
                                                            class="icon-trash"></i></button>
                                                </div>
                                            </div>
                                            <div class="dd-content mt-3">
         

                                                <p> <?php echo nl2br($fetch_users['report_info']); ?></p>
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
        $(document).ready(function () {

            $(document).on('click', '.addappoint', function () {
                //call  modal
                $('#defaultModal').modal('show');

                $("#add").click(function () {
                    
                const summernoted = $('#summary').val();
                const postid = $("#id").val();
               
                //disable the button
                const btn = $("#add");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Posting...');
                //validate
                //call Ajax
                if (postid === '' || postid === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/add_referal_note",
                        method: "POST",
                        data: {
                            postid: postid,summernoted:summernoted
                        },
                        success: function (data) {

                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "New Referrals Note Added, Please wait redirecting...!",
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


        });
    </script>

<script>
        $(document).on('click', '.delete_appoint', function () {
            //fetch data from data attribute
            const id_post = $(this).attr("data-id_post");
            // show in text field
           
            $("#post_ids").val(id_post);

            //call  modal
            $('#delete_appoint').modal('show');

            $("#delete_appoints").click(function () {
               
                const id_del = $("#post_ids").val();

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
                        url: "ajax/delete_referals",
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
                                    text: "Referrals Note Deleted, Please wait redirecting...!",
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

    <script type="text/javascript">
    $(function () {
        $('.StartDate').datetimepicker({
            debug: true,
            defaultDate: moment().add(2,'days'),
            daysOfWeekDisabled: [0, 6],
            disabledDates: ['2020-04-25', '2020-04-26']
        });
        $('.EndDate').datetimepicker({
            debug: true,
            defaultDate: moment().add(2,'days'),
            daysOfWeekDisabled: [0, 6],
            disabledDates: ['2020-04-25', '2020-04-26']
        });

        $('.summernote').summernote({
            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            popover: { image: [], link: [], air: [] }
        });

    });
</script>
</body>

</html>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">New Referrals Note</h5>
            </div>
            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <label for="emp_name">Appointment Title</label> -->
                            <div class="col-sm-12">
                            <textarea name="summary" id="summary" cols="30" rows="10" class="custom-textarea"></textarea>

                                </div>
                            <input type="hidden" class="form-control" value="<?php echo $get_staff_id;  ?>" id="id" name="id">
                        </div>
                    </div></div>
            <div class="modal-footer">
                <input type="submit" style="color:white" class="btn btn-success btn-simple waves-effect" id="add"
                    value="Add Referrals Note">
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
                <h5 class="title" id="defaultModalLabel">Do you want To delete The Referrals Note</summary></h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="" value="Continue with the action" readonly>
                        <input type="hidden" class="form-control" id="post_ids">
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
