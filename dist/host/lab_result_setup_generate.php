<?php
include "config/checkers.php";
$test_id = base64_decode($app->get_request('test_type'));
$fd = ($app->get_request('fd'));
$sql_query = $app->fetch_query("SELECT test_name from lab_test_case where id=$test_id ");
foreach($sql_query as $datas);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Add Lab Template</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
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
                                <li class="breadcrumb-item">Setup</li>
                                <li class="breadcrumb-item active">Add</li>
                            </ul>
                            <h1 class="mb-1 mt-1"> Setup / <?php echo $datas['test_name'];  ?> </h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="lab_setup.php"><button class="btn btn-default hidden-xs ml-2">Manage Lab Test</button></a>
                            <!-- <button class="btn btn-secondary hidden-xs ml-2">Department</button> -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>

                            

                            <table class="table table-hover table-mail">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Test Name</th>
                                <th>Units</th>
                                <th>Bio .Ref</th>
                                <th>Comments</th>
                                <th>Result Response</th>
                            </tr>
                            </thead>
                            <tbody>

                            <form method="post">


                                <?php
                                $x = 1;

                                while($x <= $fd) {
                                    echo '<tr class="gradeA">
                                    <td style="width: 20px;">'.$x.'</td>
                                    <td style="text-transform: capitalize">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="list_rules[]" id="notes">
                                        </div>
                                    </td>
                                    
                                     <td style="text-transform: capitalize">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="units[]" id="notes">
                                        </div>
                                    </td>
                                                                        
                                    <td style="text-transform: capitalize">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ref[]" id="notes">
                                        </div>
                                    </td>
                                    
                                    <td style="text-transform: capitalize">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="comments[]" id="notes">
                                        </div>
                                    </td>
                                                                       
                                    <td style="text-transform: capitalize"> <div class="form-group">
                                            <input type="text" class="form-control" id="notes" readonly>
                                        </div></td>
                                </tr>';
                                    $x++;
                                }
                                ?>
                                <tr class="gradeA">
                                    <td style="text-transform: capitalize">
                                    <input type="submit" name="results" value="Create Result View" class="btn btn-primary btn-outline btn-rounded font-weight-bold">
                                    </td>
                                </tr>
                            </form>
                            <?php
                            if (isset($_POST['results'])) {
                                @$each_role = $_POST['list_rules'];
                                @$units = $_POST['units'];
                                @$ref = $_POST['ref'];
                                @$comments = $_POST['comments'];
                                foreach (@$each_role as $key => $added_roles) {
                                    if(empty($added_roles)){
                                    }else{
                                        // $sql_querys = "insert into "
                                        $add_role = $add_user->custom_result($added_roles,$get_asset_id,$units[$key],$ref[$key],$comments[$key]);
                                    }
                                }
                                //var_dump($units);
                                echo'<script>alert("Result Format Created!");</script>';
                            }
                            ?>

                            </tbody>
                        </table>




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

    <script src="../assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
    <script src="../assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../assets/plugins/summernote/dist/summernote.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //validate email


        $(document).ready(function () {
            function validateForm() {
                let dpt = document.forms["myForm"]["dpt"].value;
                if (dpt === "") {
                    Swal.fire({
                        title: "The Hmo Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }


                if (dpt.length < 4) {
                    Swal.fire({
                        title: "Error!",
                        text: "Hmo must be at least 5 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            $("#myForm").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_hmo",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {

                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "HMO Added, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
                                    var btn = $("#reset-btn");
                                    btn
                                        .attr("disabled", false)
                                        .html("hmo Added!");
                                    location.href = "hmo";
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