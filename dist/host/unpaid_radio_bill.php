<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));
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

    <title>:: Emr :: Radiography Setup </title>
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
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Radiography Payments / Unpaid </h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_finance.php"><button class="btn btn-default hidden-xs ml-2">Manage
                                    Patient</button></a> </div>
                    </div>
                </div>
            </div>

            <div class="container">


                <div class="row clearfix">


                    <div class="col-lg-12">


                        <div class="card">

                            <div class="body d-flex">
                                <div class="profile-image mr-4">
                                    <img src="../profile_pic/<?php echo ($data['photo']); ?>"
                                        class="w90 rounded-circle shadow" alt="" style="">

                                </div>
                                <div class="details">
                                    <h5 class="mt-0 mb-0"><strong>
                                            <?php echo $data['patient_name']; ?>
                                        </strong></h5>
                                    <span class="text-muted font-13">
                                        <?php echo htmlspecialchars($data['hmo_name']); ?>
                                    </span>
                                    <p class="mb-1">
                                        <?php echo htmlspecialchars($data['address']); ?>
                                    </p>
                                </div>
                            </div>


                            <div class="row clearfix row-deck">

                                


                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <h6>Radiography Cases</h6>
                                                <table
                                                    class="table table-bordered table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0">SN</th>
                                                            <th class="border-top-0">Test title</th>
                                                            
                                                            <th class="border-top-0">Amount</th>
                                                            <th class="border-top-0">Created Date</th>

                                                            <th class="border-top-0">Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT patient_test_radio.*,radio_graphy_test.sample from patient_test_radio,radio_graphy_test WHERE patient_test_radio.test_id=radio_graphy_test.id and  patient_test_radio.status=0 and patient_test_radio.patient_id=$get_staff_id and patient_test_radio.payment_status='account'";
                                                        $fetch_dpt = $app->fetch_query($sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $sn++; ?>
                                                                </td>
                                                                <td>
                                                                    <p class="mb-0">
                                                                        <?= $app->stringFormat($fetch_dpt['sample'],20); ?>
                                                        </p>
                                                                </td>
                                                                
                                                                <td>
                                                                    <p class="mb-0">₦<?= number_format($fetch_dpt['amount']); ?>
                                                        </p>
                                                                </td>

                                                                <td>
                                                                    <p class="mb-0"><?= ($fetch_dpt['dated_created']); ?>
                                                        </p>
                                                                </td>

                                                                <td>
                                                                    -
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" align="right"></td>
                                                            <td></td>
                                                            <td style="font-weight: bold;">₦<?php

//  ----------------------------------------------------------------
// Process the total count of test and sum the result
$sum_test_result = "SELECT SUM(amount) as amount from patient_test_radio where patient_id=$get_staff_id and payment_status='account'";
$result = $app->fetch_query($sum_test_result);
foreach($result as $amount);
if($amount['amount']==''){
echo "0";
}else{
    echo number_format($amount['amount']);
}
?></td>
                                                            <td>
                                                                <?php
                                                                if($amount['amount']>1){

                                                                    echo "<button class='btn btn-secondary hidden-xs ml-2 account' data-pids='$get_staff_id' data-cds='$staff_ids'>Make Payment</button>";
                                                                }
                                                                ?>
                                                            
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        


        //send payment to account model
        $(document).on('click', '.account', function () {
            //fetch data from data attribute
            const pid_account = $(this).attr("data-pids");
            const cds = $(this).attr("data-cds");
           
            //disable the button
            const btn = $("#addtest");
            btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Adding...');

            if (pid_account === '' || pid_account === 0) {
                Swal.fire({
                    title: "success!",
                    text: "Invalid request, Please wait redirecting...!",
                    icon: "success",
                });
                const btn = $("#addtest");
                btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
            } else {
                $.ajax({
                    url: "ajax/account_approve_radio_payment",
                    method: "POST",
                    data: {
                        pid_account: pid_account,cds:cds
                    },
                    success: function (data) {
                        if (data.trim() == 'success') {
                            //hide  modal
                            $('#defaultModal').modal('hide');

                            Swal.fire({
                                title: "success!",
                                text: "Payment completed, Please wait redirecting...!",
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

    </script>
</body>

</html>