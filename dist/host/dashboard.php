<?php
include "config/checkers.php";
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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                        <h1 class="mb-1 mt-1">Good Morning, <?=  $username; ?></h1>
                        <span>Welcome back to your dashboard, if need a help <a href="javascript:void(0);" class="text-secondary">Contact</a> us.</span>
                    </div>            
                    <div class="col-lg-6 col-md-12 text-md-right">
                        <button class="btn btn-default hidden-xs ml-2">Download Report</button>
                        <button class="btn btn-secondary hidden-xs ml-2">New Report</button>
                    </div>
                </div>
                <div class="bh_divider"></div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12">
                        <p>New Joinee</p>
                        <ul class="list-unstyled team-info sm">
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                            <li><a href="https://www.thememakker.com/templates/amaze/html/dist/hr/patient-profile.html" title=""><img src="https://www.iconfinder.com/icons/6736294/friends_people_users_icon" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12 text-md-right">
                        <div class="inlineblock hidden-sm">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="40px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">6,2,6,5,9,3,7,9,5,1,3,5,7,4,6</div>
                            <small>Page Views</small>
                        </div>
                        <div class="inlineblock ml-4 hidden-sm">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="40px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">8,3,5,7,4,6,3,2,6,5,9,8,7,9,5</div>
                            <small>Visitors</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row clearfix row-deck">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card top_widget">
                        <div class="body">
                            <div class="icon"><i class="zmdi zmdi-flag"></i> </div>
                            <div class="content">
                                <div class="text mb-2 text-uppercase">New Employee</div>
                                <h4 class="number mb-0">31 <span class="font-12 text-muted"><i class="fa fa-level-up"></i> 13%</span></h4>
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
                                <h4 class="number mb-0">215 <span class="font-12 text-muted"><i class="fa fa-level-down"></i> 7%</span></h4>
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
                                <div class="text mb-2 text-uppercase">Total Salary</div>
                                <h4 class="number mb-0">21K <span class="font-12 text-muted"><i class="fa fa-level-down"></i> 4%</span></h4>
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
                                <div class="text mb-2 text-uppercase">Avg. Salary</div>
                                <h4 class="number mb-0">5K <span class="font-12 text-muted"><i class="fa fa-level-up"></i> 15%</span></h4>
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
                            <h2><strong>HR Activities</strong> <small>description text here...</small></h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled activity mb-0">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="zmdi zmdi-cake bg-blue"></i>                    
                                        <div class="info">
                                            <h4>Admin Birthday</h4>                    
                                            <small>Will be Dec 21th</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="zmdi zmdi-file-text bg-red"></i>
                                        <div class="info">
                                            <h4>Code Change</h4>
                                            <small>Will be Dec 22th</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="zmdi zmdi-account-box-phone bg-green"></i>
                                        <div class="info">
                                            <h4>Add New Contact</h4>                    
                                            <small>Will be Dec 23th</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="zmdi zmdi-email bg-amber"></i>
                                        <div class="info">
                                            <h4>New Email</h4>
                                            <small>Will be July 28th</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="zmdi zmdi-file-text bg-red"></i>
                                        <div class="info">
                                            <h4>Code Change</h4>                    
                                            <small>Will be Dec 22th</small>
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
                            <h2>Employee Performance</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Performance</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt=""></td>
                                            <td>Marshall Nichols</td>
                                            <td><span>UI UX Designer</span></td>
                                            <td><span class="badge badge-success">Good</span></td>
                                            <td><span class="sparkbar">5,8,6,3,5,9,2</span></td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar" alt=""></td>
                                            <td>Susie Willis</td>
                                            <td><span>Designer</span></td>
                                            <td><span class="badge badge-warning">Average</span></td>
                                            <td><span class="sparkbar">2,1,3,-3,5,9,2</span></td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar3.jpg" class="rounded-circle avatar" alt=""></td>
                                            <td>Francisco Vasquez</td>
                                            <td><span>Team Leader</span></td>
                                            <td><span class="badge badge-primary">Excellent</span></td>
                                            <td><span class="sparkbar">5,8,6,3,5,9,2</span></td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar4.jpg" class="rounded-circle avatar" alt=""></td>
                                            <td>Erin Gonzales</td>
                                            <td><span>Android Developer</span></td>
                                            <td><span class="badge badge-danger">Weak</span></td>
                                            <td><span class="sparkbar">2,-5,3,-6,-4,8,-1</span></td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/xs/avatar5.jpg" class="rounded-circle avatar" alt=""></td>
                                            <td>Ava Alexander</td>
                                            <td><span>UI UX Designer</span></td>
                                            <td><span class="badge badge-success">Good</span></td>
                                            <td><span class="sparkbar">5,8,6,3,5,9,-2</span></td>
                                        </tr>
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

</div>

<!-- Jquery Core Js --> 
<script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="../assets/bundles/apexcharts.bundle.js"></script>

<script src="../assets/bundles/mainscripts.bundle.js"></script>
<script src="../../js/hr/index.js"></script>
</body>
</html>