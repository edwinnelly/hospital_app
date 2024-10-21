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

            <div class="block-header">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="">HMO</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                            <h1 class="mb-1 mt-1"> <?= $hmo_name; ?></h1>
                            <span>Welcome back to your dashboard,<?= $username; ?> if need a help <a href="javascript:void(0);"
                                    class="text-secondary">Contact</a> us.</span>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="hmo_profiling"><button class="btn btn-default hidden-xs ml-2">New Profile</button></a>
                            <a href="hmo_account"><button class="btn btn-secondary hidden-xs ml-2">New Request</button></a>
                        </div>
                    </div>
                    <div class="bh_divider"></div>
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12">
                            <p>HMO Quick Connect</p>
                            <ul class="list-unstyled team-info sm">
                                <li><a href="" title=""><img
                                            src="https://cdn4.iconfinder.com/data/icons/coronavirus-wuhan/512/Mask-256.png"
                                            alt=""></a></li>
                                <li><a href="" title=""><img
                                            src="https://cdn4.iconfinder.com/data/icons/coronavirus-wuhan/512/contact_the_nurse-512.png"
                                            alt=""></a></li>
                                <li><a href="" title=""><img
                                            src="https://cdn4.iconfinder.com/data/icons/coronavirus-wuhan/512/fever-512.png"
                                            alt=""></a></li>
                              
                                <li><a href="" title=""><img
                                            src="https://cdn4.iconfinder.com/data/icons/mail-linefilled/512/email_mail__letter__internet__envelope__chat__down_-128.png"
                                            alt=""></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 text-md-right">
                            <div class="inlineblock hidden-sm">
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="40px"
                                    data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                    6,2,6,5,9,3,7,9,5,1,3,5,7,4,6</div>
                                <small>Page Views</small>
                            </div>
                            <div class="inlineblock ml-4 hidden-sm">
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="40px"
                                    data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                    8,3,5,7,4,6,3,2,6,5,9,8,7,9,5</div>
                                <small>Visitors</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
<br>
                <div class="row clearfix row-deck">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card top_widget">
                            <div class="body">
                                <div class="icon"><i class="zmdi zmdi-flag"></i> </div>
                                <div class="content">
                                    <div class="text mb-2 text-uppercase">Total Patient</div>
                                    <h4 class="number mb-0"><?php echo $usercount['total_p']; ?> <span
                                            class="font-12 text-muted"><i class="fa fa-level-up"></i> 0%</span></h4>
                                    <small class="text-muted">Analytics for last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card top_widget">
                            <div class="body">
                                <div class="icon"><i class="zmdi zmdi-accounts-alt"></i> </div>
                                <div class="content">
                                    <div class="text mb-2 text-uppercase">Total Employee</div>
                                    <h4 class="number mb-0"><?php echo number_format($userInfo123['total']); ?> <span
                                            class="font-12 text-muted"><i class="fa fa-level-down"></i> 0%</span></h4>
                                    <small class="text-muted">Analytics for last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card top_widget">
                            <div class="body">
                                <div class="icon"><i class="zmdi zmdi-account"></i> </div>
                                <div class="content">
                                    <div class="text mb-2 text-uppercase">Total Plans</div>
                                    <h4 class="number mb-0"><?php echo number_format($usercount_plans['total_plans']); ?><span class="font-12 text-muted"><i
                                                class="fa fa-level-down"></i> 4%</span></h4>
                                    <small class="text-muted">Analytics for last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card top_widget">
                            <div class="body">
                                <div class="icon"><i class="zmdi zmdi-thumb-up"></i> </div>
                                <div class="content">
                                    <div class="text mb-2 text-uppercase">Total IN/OUT</div>
                                    <h4 class="number mb-0">5K <span class="font-12 text-muted"><i
                                                class="fa fa-level-up"></i> 15%</span></h4>
                                    <small class="text-muted">Analytics for last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row clearfix row-deck">
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="card activities">
                            <div class="header">
                                <h2><strong>HMO Activities</strong> <small>Manage Hmo Activities Here</small></h2>
                            </div>
                            <div class="body">
                                <ul class="list-unstyled activity mb-0">
                                    <li>
                                        <a href="hmo_profiling">
                                            <i class="zmdi zmdi-file bg-blue"></i>
                                            <div class="info">
                                                <h4>HMO Profiling Mgt</h4>
                                                <small>Manage the hmo Profiling here</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="patient_all_hmo">
                                            <i class="zmdi zmdi-file-text bg-red"></i>
                                            <div class="info">
                                                <h4>Patient Lists</h4>
                                                <small>Manage the hmo users here</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="hmo_account">
                                            <i class="zmdi zmdi-account-box-phone bg-green"></i>
                                            <div class="info">
                                                <h4>Patient Request</h4>
                                                <small>Manage the users request here</small>
                                            </div>
                                        </a>
                                    </li>
                                  
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="zmdi zmdi-file-text bg-orange"></i>
                                            <div class="info">
                                                <h4>Hmo Finance Reports</h4>
                                                <small>Manage accounting here</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Hmo Users</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable mb-0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="c_checkbox">
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Name</th>
                                                <th>PID</th>
                                                <th>Phone</th>
                                                <th>Join Date</th>
                                                <th>Marital Status</th>
                                                <th>Age</th>

                                                <th>Occupation</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //fetcher from the patient table 
                                            $patient_records_sql_hmo = "SELECT * FROM patient_data  where hmo_id =$hmo_key";
                                            $fetch_query = $app->fetch_query($patient_records_sql_hmo);
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
                                                            <?php echo $value['pid']; ?>
                                                        </span></td>
                                                    <td><span>
                                                            <?php echo $value['phone_no']; ?>
                                                        </span></td>
                                                    <td>
                                                        <?php echo $value['added_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['marital_status']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['age']; ?>
                                                    </td>
                                                    <td>

                                                        <?php echo $app->stringFormat($value['occupation'], 20); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $app->stringFormat($value['address'], 40); ?>
                                                    </td>

                                                    <td>

                                                        <label for="">Active</label>

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