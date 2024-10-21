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

    <title>:: Emr :: Lab payment </title>
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
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;"> Lab Profile Bill</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_finance.php"><button class="btn btn-default hidden-xs ml-2">Manage Patient</button></a>
                            <a href="unpaid_lab_bill.php?fid=<?php echo base64_encode($get_staff_id);  ?>"> <button class="btn btn-secondary hidden-xs ml-2">Unpaid Transaction</button></a>
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
            function validateForm() {
                let fn = document.forms["myForm"]["fn"].value;
                let age = document.forms["myForm"]["age"].value;
                let phone = document.forms["myForm"]["phone"].value;
                let account_type = document.forms["myForm"]["account_type"].value;
                let email = document.forms["myForm"]["email"].value;

                if (fn === "") {
                    Swal.fire({
                        title: "The Fullname Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (age === "") {
                    Swal.fire({
                        title: "The Age Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (phone === "") {
                    Swal.fire({
                        title: "The Phone Number Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (email === "") {
                    Swal.fire({
                        title: "The Email address Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (fn.length < 5) {
                    Swal.fire({
                        title: "Error!",
                        text: "Fullname must be at least 8 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                if (age >100) {
                    Swal.fire({
                        title: "Error!",
                        text: "Age must be at least 1 - 100",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                // alert("eddwards");
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/update_patient",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Account Updated, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 3000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Posting Failed try again!",
                                    icon: "error",
                                });
                            }
                        },
                    });
                } else {

                }

            }));


            //file upload function
            $("#myForm009").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#upload-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Uploading");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/patient_pic",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                          
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Profile Picture Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#upload-btn");
                                btn
                                .attr("disabled", false)
                                .html("Update Account");
                                location.reload();
                            }, 3000);     
                            } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Posting Failed try again!",
                                icon: "error",
                            });
                            }
                        },

                    });
                } else {

                }

            }));



        });
    </script>


   
</body>

</html>