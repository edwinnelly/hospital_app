<?php
include "config/checkers.php";
$cat_name = base64_decode($app->get_request('cat_name'));
$cat_fid = (int) base64_decode($app->get_request('fid'));
//fetch the category
$sqls = "SELECT * FROM asset where asset_id=$cat_fid";
$assets = $app->fetch_query($sqls);
foreach ($assets as $data)
    ;
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:Edit Asset</title>
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
                                <li class="breadcrumb-item">Asset</li>
                                <li class="breadcrumb-item active">New</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Edit Asset</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="asset.php"><button class="btn btn-default hidden-xs ml-2">Manage Asset</button></a>
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
                            <!-- <form name="myForm" id="myForm" method="post"> -->
                                <form name="myForm" id="myForm" method="post" class="form mt-5">
                                    <div class="body">
                                        <div class="row clearfix">
                                            <input type="hidden" name="pid" value="<?php echo $data['asset_id']; ?>">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Asset Name</label>
                                                    <input type="text" id="asset_name" class="form-control"
                                                        name="asset_name" placeholder="Name Of Asset"
                                                        value="<?php echo $data['asset_name']; ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Asset Type</label>
                                                    <input type="text" id="asset_type" class="form-control"
                                                        name="asset_type" placeholder="Asset Type"
                                                        value="<?php echo $data['asset_type']; ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Asset Price</label>
                                                    <input type="text" id="asset_price" class="form-control"
                                                        value="<?php echo $data['purchase_price']; ?>"
                                                        name="asset_price" placeholder="Asset Price" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="text" id="asset_location" class="form-control"
                                                        value="<?php echo $data['location']; ?>" name="asset_location"
                                                        placeholder="Asset Location" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Owner</label>
                                                    <input type="text" id="owner" class="form-control" name="owner"
                                                        placeholder="Asset owner" value="<?php echo $data['owner']; ?>"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    <input type="text" id="Notes" class="form-control"
                                                        value="<?php echo $data['notes']; ?>" name="notes"
                                                        placeholder="Notes" required>
                                                </div>
                                            </div>


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Purchase Date</label>
                                                    <input type="date" class="form-control" id="asset_date"
                                                        value="<?php echo $data['purchase_date']; ?>"
                                                        name="asset_date">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Current value</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $data['current_value']; ?>"
                                                        id="current_value" name="current_value">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label>Asset Condition</label>
                                                    <select class="form-control show-tick" id="condition"
                                                        name="condition">
                                                        <option value="<?php echo $data['condition_asset']; ?>">
                                                            <?php echo $data['condition_asset']; ?>
                                                        </option>
                                                        <option value="good">Good</option>
                                                        <option value="bad">Bad</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="reset-btn" class="btn btn-primary">Update
                                                        Asset</button>
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
        //validate email


        $(document).ready(function () {
            function validateForm() {
                let asset_name = document.forms["myForm"]["asset_name"].value;
                let asset_type = document.forms["myForm"]["asset_type"].value;
            
                if (asset_name === "") {
                    Swal.fire({
                        title: "The Asset Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

             
                if (asset_name.length < 3) {
                    Swal.fire({
                        title: "Error!",
                        text: "Asset must be at least 4 characters long.",
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
                        url: "ajax/asset_update",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Asset Created, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#reset-btn");
                                btn
                                .attr("disabled", false)
                                .html("Asset Created!");
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