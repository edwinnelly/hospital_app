<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$pid = base64_decode($app->get_request('pid'));
$starts = $app->get_request('starts');
$ends = $app->get_request('ends');
//sql command
$query = "SELECT patient_data.*, patient_data.photo AS pid_photo 
FROM patient_data 
JOIN hmo ON patient_data.hmo_id = hmo.id 
WHERE patient_data.pid = $pid;
";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
    ;
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: EMR :: Patient Result</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
    <style type="text/css" media="print">

div#DivIdToPrint {
    display: inline ;
}

</style>

</head>

<body class="font-ubuntu ">

    <div id="body" class="theme-blue">

        <!-- Page Loader -->
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
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item">Patient</li>
                                <li class="breadcrumb-item active">Result</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Invoice #1069</h1>
                            <span>Result Print : Jun, 2020</span>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-secondary hidden-xs" data-toggle="modal"
                                data-target="#addDepartments">Add New</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    
                    <div class="col-lg-12">
                    <div id="DivIdToPrint">
                        <div class="card invoice1">
                            <div class="body">
                                <div class="widget-user">
                                    <img class="rounded-circle" src="../assets/images/logo-black.svg" alt="">
                                    <div class="wid-u-info ml-3">
                                        <h6>Maxsomeware inc.</h6>
                                        <p class="text-muted mb-0">123 6th St. Melbourne, FL 32904</p>
                                    </div>
                                    <div class="wid-u-info ml-3">
                                        <h6>Support@Maxsomeware.com</h6>
                                        <p class="text-muted mb-0">+234-800-776-89, +234-901-344-233</p>
                                    </div>
                                    <div class="wid-u-info ml-3">
                                        <h6>Sample Collected At</h6>
                                        <p class="text-muted mb-0">123 6th St. Melbourne, FL 32904</p>
                                    </div>
                                </div>
                                <div class="bh_divider"></div>
                                <div class="invoice-mid clearfix">
                                    <div class="widget-user">
                                        <img class="rounded-circle" src="../profile_pic/<?php echo $data['pid_photo']; ?>"
                                            alt="">
                                        <div class="wid-u-info ml-3">
                                            <h6><?php echo $data['patient_name']; ?></h6>
                                            <p class="text-muted mb-0">Gender: <?php echo $data['sex']; ?></p>
                                            <p class="text-muted mb-0">Age: <?php echo $data['age']; ?></p>
                                            <p class="text-muted mb-0">PID: <?php echo $data['pid']; ?></p>
                                        </div>
                                        <div class="wid-u-info ml-3">
                                            <h6>...</h6>
                                            <p class="text-muted mb-0">Created on: ...</p>
                                            <p class="text-muted mb-0">Collected on:
                                                <?php echo date('M:D:Y h:i:sa'); ?>
                                            <p>
                                            <p class="text-muted mb-0">Website: Maxsomeware.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bh_divider"></div>
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Investigation</th>
                                                        <th>Result</th>
                                                        <th>Reference Value</th>
                                                        <th>Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // $sql = "SELECT patient_test.*,lab_test_case.test_name,staffs_accounts.firstname,staffs_accounts.lastname from patient_test,lab_test_case,staffs_accounts WHERE patient_test.test_id=lab_test_case.id and patient_test.taken_by=staffs_accounts.id and patient_test.patient_id=$get_staff_id";
                                                    $sql = "SELECT patient_test.*, department.*,patient_test.status as pstatus ,staffs_accounts.firstname,lab_test_case.test_name,lab_test_case.ranges_test,lab_test_case.unit, staffs_accounts.lastname FROM patient_test JOIN department ON patient_test.dpt=department.id JOIN staffs_accounts on patient_test.taken_by=staffs_accounts.id JOIN lab_test_case ON patient_test.test_id=lab_test_case.id WHERE patient_test.patient_id=$pid and patient_test.payment_status='paid' and patient_test.dated_created BETWEEN '$starts' AND '$ends' and patient_test.status='4'";

                                                    $fetch_dpt_rs = $app->fetch_query($sql);

                                                    $sql_total_test = "SELECT SUM(patient_test.amount) AS total_amount FROM patient_test  WHERE patient_test.patient_id=$pid and patient_test.payment_status='paid' and patient_test.dated_created BETWEEN '$starts' AND '$ends' and patient_test.status='4'";
                                                    $fetch_dpt_total = $app->fetch_query($sql_total_test);


                                                    $sn = 1;
                                                    foreach ($fetch_dpt_rs as $fetch_dpt) {
                                                        ?>
                                                        <tr>
                                                            <td> <?= $sn++; ?></td>
                                                            <td> <?= $app->stringFormat($fetch_dpt['test_name'], 40); ?>
                                                            </td>
                                                            <td class="text-success"><?= $app->stringFormat($fetch_dpt['result'], 40); ?></td>
                                                            <td class="text-success"><?= $app->stringFormat($fetch_dpt['ranges_test'], 40); ?></td>
                                                            <td class="text-success"><?= $app->stringFormat($fetch_dpt['unit'], 40); ?></td>
                                                             </tr>

                                                        <?php
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <h5>Note</h5>
                                        <p class="text-muted font-12">Please note that the Investigations here has been
                                            verified by the HOD of the department </p>
                                    </div>
                                    <?php
                                    foreach ($fetch_dpt_total as $total_amount);?>
                                    <div class="col-md-6 text-right">
                                        <p class="mb-0"><b>Result ID:</b> <?php echo rand(1234567, 123456789); ?></p>
                                        <p class="mb-0"><b>Tax:</b>₦0.00</p>
                                        <h5 class="mb-0 mt-2">Net amount
                                            ₦<?php echo number_format($total_amount['total_amount'], 2); ?></h5>
                                    </div>
                                </div>
                                <div class="hidden-print text-right">
                                    <button class="btn btn-default" id="ccv" onclick='printContent("DivIdToPrint");'><i class="zmdi zmdi-print" id="ccv"></i></button>
                                    <button class="btn btn-primary">Mail Result</button>
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

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script>

    function printContent(el) {
        $("#ccv").hide();
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>
</body>

</html>