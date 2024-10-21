<?php
include "config/checkers.php";

//count the number of employee
$sql = "SELECT COUNT(*) AS total FROM staffs_accounts where hmo_key='$hmo_key'";
$userInfos = $app->fetch_query($sql);
foreach ($userInfos as $userInfo123)
    ;

//count the number of patient by hmo
$sql_hmo_patient_data = "SELECT COUNT(*) AS total_p FROM patient_data where hmo_id='$hmo_key'";
$userInfos_p = $app->fetch_query($sql_hmo_patient_data);
foreach ($userInfos_p as $usercount)
    ;


//count the number of plans by hmo
$sql_hmo_patient_data1 = "SELECT COUNT(*) AS total_plans FROM hmo_profiles where hmo_id='$hmo_key'";
$userInfos_plan = $app->fetch_query($sql_hmo_patient_data1);
foreach ($userInfos_plan as $usercount_plans)
    ;


?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>:: Maxsomeware :: Dashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
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
                                <h2><strong>HMO Request Activities</strong> <small>Manage Hmo Account Activities
                                        Here</small></h2>
                            </div>
                            <div class="body">
                                <?php
                                include "inc/hmo_menu.php";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Hmo Users Request</h2>
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
                                                <th>PID</th>
                                                <th>Requested Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_pin = "SELECT hpr.patient_id, hpr.hmo_id, hpr.service_id, hpr.request_date,hpr.docid, pd.patient_name,
                                            hpr.request_date FROM hmo_payment_requests hpr JOIN patient_data pd ON hpr.patient_id = pd.pid WHERE hpr.status = 'paid' and hpr.hmo_id='$hmo_key' GROUP BY hpr.patient_id";
                                            $fetch_query = $app->fetch_query($sql_pin);
                                            // Create for each employee loop in php
                                            $count = 1;
                                            foreach ($fetch_query as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td class="width45">
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td class="d-flex">
                                                        <img src="../user.avif" class="rounded-circle avatar" alt="">
                                                        <div class="ml-2">
                                                            <h6 class="mb-0" style="text-transform: capitalize;">
                                                                <?php echo $app->stringFormat($value['patient_name'], 20); ?>
                                                            </h6>
                                                            <span class="text-muted">
                                                                <?php echo $value['sex']; ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><span>PID-
                                                            <?php echo $value['patient_id']; ?>
                                                        </span></td>

                                                    <td>
                                                        <?php echo 'In Progress'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo 'Pending'; ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="hmo_request_app_view_process.php?id=<?php echo base64_encode($value['patient_id']); ?>"><label
                                                                for="" class="btn btn-primary btn-sm">Open file</label></a>
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
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="../assets/bundles/apexcharts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../js/hr/index.js"></script>
</body>

</html>