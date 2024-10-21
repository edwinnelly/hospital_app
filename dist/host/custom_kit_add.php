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

    <title>:Add New Custom Kit</title>
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
                                <li class="breadcrumb-item">Custom Kit</li>
                                <li class="breadcrumb-item active">New</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Add Custom Kit</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="custom_kit"><button class="btn btn-default hidden-xs ml-2">Manage Custom Kit</button></a>
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
                            <form name="myForm" id="myForm" method="post">
                                <form name="myForm" id="myForm" method="post" class="form mt-5">
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" id="kit_name" class="form-control" name="kit_name"
                                                        placeholder="Kit Name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" id="catgory" name="catgory">
                                                        <option value="Empty">Select Category</option>
                                                        <option value="sample">Sample</option>
                                                        <option value="containers">containers</option>
                                                        <option value="restrictions">Restrictions </option>
                                                    </select>
                                                </div>
                                            </div>
                                
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="reset-btn" class="btn btn-primary">Add
                                                        Kit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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
        $(document).ready(function () {
            function validateForm() {
                let kit_name = document.forms["myForm"]["kit_name"].value;
                let catgory = document.forms["myForm"]["catgory"].value;
                if (kit_name === "") {
                    Swal.fire({
                        title: "The Kit Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (kit_name.length < 5) {
                    Swal.fire({
                        title: "Error!",
                        text: "Kit Name must be at least 5 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_custom_kit",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Custom Kit Created, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Kit Created!");
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