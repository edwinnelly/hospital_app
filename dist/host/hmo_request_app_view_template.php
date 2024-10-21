<?php
include "config/checkers.php";
$get_pid = ($app->get_request('id'));
//check if the pid exist or die
if (!($get_pid)) {
    die("AI not ready for the request");
}
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AI">
    <title>:: Maxsomeware :: Dashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
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
                                <ul class="list-unstyled activity mb-0">
                                    <li>
                                        <a href="patient_hmoview.php">
                                            <i class="zmdi zmdi-file bg-blue"></i>
                                            <div class="info">
                                                <h4>New Request</h4>
                                                <small>Manage the hmo Request here</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="hmo_request_app">
                                            <i class="zmdi zmdi-file-text bg-red"></i>
                                            <div class="info">
                                                <h4>My Request</h4>
                                                <small>Manage the hmo users Approved here</small>
                                            </div>
                                        </a>
                                    </li>
                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Hmo Users / All Request</h2>
                                
                            </div>
                            <?php

                                $sql_sum_total="SELECT SUM(s.amount) AS total_amount
                                FROM hmo_payment_requests hpr
                                JOIN services_hospital s ON hpr.service_id = s.id where hpr.docid='$get_pid';
                                ";
                                $fetch_query1 = $app->fetch_query($sql_sum_total);
                                                                            
                                  foreach ($fetch_query1 as $key => $values)
                                ?>
                            <div class="body"><h5>₦<?php echo number_format($values['total_amount']);  ?></h5>
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable mb-0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    SN
                                                </th>
                                                <th>Bill Description</th>
                                                <th>Requested Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch all the hmo request from database
                                            $hmo_request = "SELECT 
                                            hpr.service_id,
                                            hpr.hmo_id, 
                                            hpr.request_date,
                                            hpr.docid,
                                            hpr.status,
                                            hs.id,
                                            hs.amount,
                                            hs.name
                                        FROM 
                                            hmo_payment_requests hpr
                                        JOIN 
                                            services_hospital hs 
                                        ON 
                                            hpr.service_id = hs.id
                                        WHERE 
                                            hpr.docid = '$get_pid';
                                        ";
                                            $fetch_query = $app->fetch_query($hmo_request);
                                            // Create for each employee loop in php
                                            $count = 1;
                                            foreach ($fetch_query as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td class="width45">
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td>
                                                    <h6 class="mb-0" style="text-transform: capitalize;">
                                                                <?php echo $app->stringFormat($value['name'], 60); ?>
                                                            </h6>
                                                    </td>
                                                    
                                                    <td>
                                                    ₦<?php echo number_format($value['amount']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['status']; ?>
                                                    </td>
                                                    <td>
                                                        <img src="load.gif" alt="" style="height:40px">
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
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>