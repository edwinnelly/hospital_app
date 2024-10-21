<?php
include "config/checkers.php";
$getid = ($app->get_request('fid'));
$department_test = "SELECT 
 patient_test_radio.*, 
 radio_graphy_test.*, 
 patient_test_radio.dated_created AS crdate
FROM 
 patient_test_radio
JOIN 
 radio_graphy_test ON patient_test_radio.test_id = radio_graphy_test.id
WHERE 
  patient_test_radio.passkey ='$getid'
";
$fetch_dpt = $app->fetch_query($department_test);
foreach($fetch_dpt as $rows);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: Emr :: Departments</title>
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
                                <li class="breadcrumb-item">Test</li>
                                <li class="breadcrumb-item active">Departments</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Radio Departments Cases / Approval</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                        <button class="btn btn-default btn-sm approve" data-id="<?php echo $getid;  ?>">Approve</button>
                                <button class="btn btn-danger btn-sm decline" data-id="<?php echo $getid;  ?>">Reject</button>
                            <a href="patient_all_radio.php"><button class="btn btn-secondary hidden-xs btn-sm">Patients
                                    Profile</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                            <div class="timeline-item blue" date-is="19-04-2020 - Yesterday">
                               
                                <div class="msg">
                                    <p><?php echo $rows['comments'];  ?></p>
                                    <img class="w-25" src="../radio_pic/<?php if($rows['photo1']==''){echo 'def.png';}else{echo $rows['photo1'];} ?>" alt="Image1">
                                    <img class="w-25" src="../radio_pic/<?php if($rows['photo2']==''){echo 'def.png';}else{echo $rows['photo2'];} ?>" alt="Image2">
                                    <img class="w-25" src="../radio_pic/<?php if($rows['photo3']==''){echo 'def.png';}else{echo $rows['photo3'];} ?>" alt="Image3">
                                    <img class="w-25" src="../radio_pic/<?php if($rows['photo4']==''){echo 'def.png';}else{echo $rows['photo4'];} ?>" alt="Image4">
                                   
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
        $(document).on('click', '.approve', function () {
            //fetch data from data attribute
            const smkey = $(this).attr("data-id");
        
            // show in text field
            $("#smkey").val(smkey);
           
            //call  modal
            $('#defaultModal').modal('show');

            $("#delete_emp").click(function () {
                
                const id_del = $("#smkey").val();

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
                        url: "ajax/update_radio_approved_test",
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
                                    text: "Result Approved, Please wait redirecting...!",
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



        $(document).on('click', '.decline', function () {
            //fetch data from data attribute
            const smkeys = $(this).attr("data-id");
        
            // show in text field
            $("#smkeys").val(smkeys);
           
            //call  modal
            $('#defaultModal1').modal('show');

            $("#delete_emps").click(function () {
                const id_dels = $("#smkeys").val();
                //disable the button
                const btn = $("#delete_emps");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                //validate
                //call Ajax
                if (id_dels === '' || id_dels === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/update_radio_decline_test",
                        method: "POST",
                        data: {
                            id_dels: id_dels
                        },
                        success: function (data) {

                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Result rejected, Please wait redirecting...!",
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
                <h5 class="title" id="defaultModalLabel">Approve Result</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""> Sm Key</label>
                        <input type="text" class="form-control" id="smkey" readonly style="width: 400px;">
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal" style="color:white">Approve</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="defaultModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Decline Result</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""> Sm Key</label>
                        <input type="text" class="form-control" id="smkeys" readonly style="width: 400px;">
                        <input type="hidden" class="form-control" id="ids">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emps"
                    data-dismiss="modal" style="color:white">Decline</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>