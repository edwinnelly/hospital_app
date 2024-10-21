<?php
include "config/checkers.php";
$fetch_leave = $app->fetch_query($leave_request);
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>:: EMR :: Leave Request</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css"/>
<link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">

<!-- Custom Css -->
<link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu ">

<div id="body" class="theme-blue">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="mt-3"><img class="zmdi-hc-spin w60" src="../assets/images/loader.svg" alt="EMR"></div>
            <p>Please wait...</p>
        </div>
    </div>

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
                            <li class="breadcrumb-item">Employee</li>
                            <li class="breadcrumb-item active">Request</li>
                        </ul>
                        <h1 class="mb-1 mt-1">Leave Request</h1>
                    </div>            
                    <div class="col-lg-6 col-md-12 text-md-right">
                        <a href="leave_request.php"><button class="btn btn-secondary hidden-xs">Add New Request</button></a>
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Employee ID</th>
                                            <th>Leave Type</th>
                                            <th>Leave Date</th>
                                            <th>Creation Date</th>
                                            <th>Approved Date</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Create for each employee loop in php
                                            foreach($fetch_leave as $key => $data){
                                        ?>
                                        <tr>
                                            <td class="width45">                                           
                                                <img src="../user.avif" class="rounded-circle avatar" alt="">
                                            </td>
                                            <td>
                                                <h6 class="mb-0"><?php echo ($data['firstname']) . ' ' .($data['lastname']);   ?></h6>                                            
                                            </td>
                                            <td><span>ST-<?php echo ($data['staff_id']);  ?></span></td>
                                            <td><span><?php echo ($data['leave_type']);  ?></span></td>
                                            <td><?php echo ($data['date1']);  ?> to <?php echo ($data['date2']);  ?></td>
                                            <td><span><?php echo ($data['date_created']);  ?></span></td>
                                            <td><span><?php echo ($data['approved_date']);  ?></span></td>
                                            <td><?php $note= $app->stringFormat($data['reasons'],20);  echo ($note); ?></td>
                                            <td><?php $status= ($data['status']); if($status==1){echo '<span class="text-danger">Pending</span>';}else{echo '<span class="text-sucess">Approved</span>'; } ?></td>
                                            <td>
                                                <?php
                                                if($data['status']==1){
                                                    include "checkers/leave_action.php";
                                                }else{
                                                    echo "Completed";
                                                }
                                                ?>
                                                
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

include"inc/footer.php";
?>
        </div>

    </div>

    <!-- Default Size -->
    
</div>


<!-- Jquery Core Js --> 
<script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="../assets/bundles/datatablescripts.bundle.js"></script>
<script src="../assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
<script src="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

<script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="../../js/pages/tables/jquery-datatable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function () {
        $('.from').datetimepicker(
            {   
                debug: true,
                defaultDate: moment().add(2,'days'),
                daysOfWeekDisabled: [0, 6],
                disabledDates: ['2020-04-25', '2020-04-26']         
            }
        );
        $('.from-to').datetimepicker(
            {   
                debug: true,
                defaultDate: moment().add(2,'days'),
                daysOfWeekDisabled: [0, 6],
                disabledDates: ['2020-04-25', '2020-04-26']         
            }
        );
    });
</script>

<script>
        $(document).on('click', '.delete_emp', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const fullname = $(this).attr("data-fullname");
            const reason = $(this).attr("data-reason");

            // show in text field
            $("#fullname").val(fullname);
            $("#reason").val(reason);
            $("#id").val(id);

            //call  modal
            $('#defaultModal').modal('show');

            $("#delete_emp").click(function () {
                const emp_name_del = $("#emp_name").val();
                const id_del = $("#id").val();

                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> wait...');
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
                        url: "ajax/update_leave",
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
                                    text: "Leave Approved, Please wait redirecting...!",
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

        $(document).on('click', '.cancel', function () {
            //fetch data from data attribute
            const id1 = $(this).attr("data-id");
            const fullname1 = $(this).attr("data-fullname");
            const reason1 = $(this).attr("data-reason");

            // show in text field
            $("#fullname1").val(fullname1);
            $("#reason1").val(reason1);
            $("#id1").val(id1);

            //call  modal
            $('#defaultModal123').modal('show');

            $("#delete_emps").click(function () {
                const emp_name_del = $("#emp_name").val();
                const id_del1 = $("#id1").val();

                //disable the button
                const btn = $("#delete_emps");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> wait...');
                //validate
                //call Ajax
                if (id_del1 === '' || id_del1 === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#delete_emps");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/delete_leave_request",
                        method: "POST",
                        data: {
                            id_del1: id_del1
                        },
                        success: function (data) {
                            if (data.trim() == 'success') {
                                //hide  modal
                                $('#defaultModal123').modal('hide');
                                Swal.fire({
                                    title: "success!",
                                    text: "Leave Declined, Please wait redirecting...!",
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
                <h5 class="title" id="defaultModalLabel">Do You Want To Approve The Leave Request</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="fullname" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                                <textarea style="width:400px" readonly rows="6" class="form-control no-resize" placeholder="Leave Reason *" id="reason" name="reason"></textarea>
                            </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal">Yes, Continue</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="defaultModal123" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Leave Request</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="fullname1" readonly>
                        <input type="hidden" class="form-control" id="id1">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                                <textarea style="width:400px" readonly rows="6" class="form-control no-resize" placeholder="Leave Reason *" id="reason1" name="reason"></textarea>
                            </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emps"
                    data-dismiss="modal">Yes, Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>