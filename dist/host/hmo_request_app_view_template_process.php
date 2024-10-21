<?php
include "config/checkers.php";
$get_pid = base64_decode($app->get_request('id'));
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
                                <?php
                                include "inc/hmo_menu.php";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Hmo Users / All Request</h2>

                            </div>
                            <?php

                            $sql_sum_total = "SELECT SUM(s.amount) AS total_amount
                                FROM hmo_payment_requests hpr
                                JOIN services_hospital s ON hpr.service_id = s.id where hpr.docid='$get_pid';
                                ";
                            $fetch_query1 = $app->fetch_query($sql_sum_total);

                            foreach ($fetch_query1 as $key => $values)
                            ?>
                            <div class="body">
                                <h5>₦<?php echo number_format($values['total_amount']); ?></h5>

                                <form name="myForm" id="myForm" method="post"
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                        <input type="hidden" name="hotelid" value="<?php echo $hotelid; ?>">
                                        <div class="col-md-4">


                                            <?php
                                            // Fetch all the hmo request from database
                                            $hmo_request = "SELECT 
                                            hpr.service_id,
                                            hpr.hmo_id, 
                                            hpr.request_date,
                                            hpr.docid,
                                            hpr.status,
                                            hpr.request_id,
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
                                                <br>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="facilities[]"
                                                        value="<?php echo $value['request_id']; ?>" id="gym" <?php if ($value['status'] == 'paid') {
                                                               echo 'checked';
                                                           } ?>>
                                                    <label class="form-check-label"
                                                        for="gym"><?php echo $app->stringFormat($value['name'], 60); ?></label>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>


                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-warning" onclick="checkAll()">Check
                                        All</button>
                                    <button type="button" class="btn btn-warning" onclick="uncheckAll()">Uncheck
                                        All</button>
                                    <button type="submit" id="reset-btn" class="btn btn-primary">Approve
                                        Request</button>
                                    <button type="submit" id="reset-reject" class="btn btn-danger">Reject
                                        Request</button>
                                </form>



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
        //validate email

        $(document).ready(function () {
            // Add button click event
            $("#reset-btn").click(function () {
                /* function to login user */
                $("#myForm").on('submit', (function (e) {

                    e.preventDefault();
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/approved_hmo_request",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {

                            if (data.trim() == "Success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "HMO Request Approved, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html("Completed");
                                    location.reload();
                                }, 3000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: data,
                                    icon: "error",
                                });

                            }

                        },

                    });


                }));

            });
        });

    </script>

    <script>
        //validate email

        $(document).ready(function () {
            // Add button click event
            $("#reset-reject").click(function () {
                /* function to login user */
                $("#myForm").on('submit', (function (e) {

                    e.preventDefault();
                    var btn = $("#reset-reject");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/approved_hmo_request_reject",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {

                            if (data.trim() == "Success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "HMO Request Rejected, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
                                    var btn = $("#reset-reject");
                                    btn
                                        .attr("disabled", false)
                                        .html("Completed");
                                    location.reload();
                                }, 3000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: data,
                                    icon: "error",
                                });

                            }

                        },

                    });


                }));
            });
        });
    </script>
    <script>
            function checkAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = true;
                });
            }

            function uncheckAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            }
    </script>
</body>

</html>