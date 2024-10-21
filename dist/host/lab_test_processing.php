<?php
include "config/checkers.php";
  $get_staff_id = base64_decode($app->get_request('fid'));
 $get_staff_name = $app->get_request('st');
 //sql command
 $query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
 $get_data_details = $app->fetch_query($query);
 foreach($get_data_details as $data)
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Emr :: Lab sample </title>
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
                                <li class="breadcrumb-item active">Lab</li>
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Test Sample Collection Unit</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_finance.php"><button class="btn btn-default hidden-xs ml-2">Manage Patient</button></a>
                           
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
                                                            <th class="border-top-0">Test title</th>
                                                            <th class="border-top-0">SM</th>
                                                            <th class="border-top-0">Creation Date</th>
                                                            
                                                            <th class="border-top-0">Amount</th>
                                                            <th class="border-top-0">Status</th>
                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // $sql = "SELECT patient_test.*,lab_test_case.test_name,staffs_accounts.firstname,staffs_accounts.lastname from patient_test,lab_test_case,staffs_accounts WHERE patient_test.test_id=lab_test_case.id and patient_test.taken_by=staffs_accounts.id and patient_test.patient_id=$get_staff_id";
                                                        $sql = "SELECT patient_test.*, department.*,patient_test.status as pstatus ,staffs_accounts.firstname,lab_test_case.test_name, staffs_accounts.lastname FROM patient_test JOIN department ON patient_test.dpt=department.id JOIN staffs_accounts on patient_test.taken_by=staffs_accounts.id JOIN lab_test_case ON patient_test.test_id=lab_test_case.id WHERE patient_test.patient_id=$get_staff_id and patient_test.payment_status='paid'";
                                                        $fetch_dpt = $app->fetch_query($sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $sn++; ?>
                                                                </td>
                                                                <td>
                                                                    <p class="">
                                                                        <?= $app->stringFormat($fetch_dpt['test_name'],40); ?>
                                                        </p>
                                                                </td>
                                                                <td>
                                                                    <p class="">
                                                                        <?= $app->stringFormat($fetch_dpt['passkey'],40); ?>
                                                        </p>
                                                                </td>

                                                                
                                                                <td>
                                                                    <p class="mb-0">
                                                                        <?= $app->stringFormat($fetch_dpt['dated_created'],40); ?> 
                                                        </p>
                                                                </td>
                                                                
                                                                <td>
                                                                    <p class="mb-0">
                                                                    ₦<?= number_format($fetch_dpt['amount']); ?>
                                                        </p>
                                                                </td>
                                                                <td>
                                                                    <?php  $payment_status = $fetch_dpt['pstatus']; 
                                                                    if($payment_status==1){
                                                                        echo'<span class="badge badge-default">Processing</span>';
                                                                    }elseif($payment_status==2){
                                                                        echo'<span class="badge badge-warning">Inprogress</span>';
                                                                    }elseif($payment_status==3){
                                                                        echo'<span class="badge badge-secondary">Completed</span>';
                                                                    }elseif($payment_status==4){
                                                                        echo'<span class="badge badge-secondary">Approved</span>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary samples" data-id='<?= (int) $fetch_dpt['passkey']; ?>'>Send Sample</button>
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
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            
            $(document).on('click', '.samples', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            // show in text field
            $("#id").val(id);
            $("#sample").val(id);

            //call  modal
            $('#defaultModal').modal('show');

            $("#delete_emp").click(function () {
                
                const id_del = $("#id").val();

                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> please wait...');
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
                        url: "ajax/send_test_to_departmrnt",
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
                                    text: "Sample Has Been Sent To Department, Please wait redirecting...!",
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


   
</body>

</html>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Send Sample To Department</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm The SM To Continue</label>
                        <input type="text" class="form-control" id="sample" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal">Send Sample</button>
                <!-- <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button> -->
            </div>
        </div>
    </div>
</div>