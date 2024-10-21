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

    <title>:Add New Drugs</title>
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
                                <li class="breadcrumb-item">Drugs</li>
                                <li class="breadcrumb-item active">Add</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Add Drugs</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="druglists"><button class="btn btn-default hidden-xs ml-2">Manage
                                    Drugs</button></a>
                            <a href=""><button class="btn btn-secondary hidden-xs ml-2">Categories</button></a>
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

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" id="medicine" class="form-control"
                                                        name="medicine" placeholder="Medicine" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="qty" name="qty"
                                                        placeholder="Aval Quantity" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="drug_category"
                                                        id="hmo_id">
                                                        <option value="0">Select Drug Category</option>
                                                        <?php
                                                        
                                                        $hmo = $app->fetch_query($drugs_category_sql);

                                                        foreach ($hmo as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>">
                                                                <?php echo $data['category_name']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="supplier_id"
                                                        id="supplier_id">
                                                        <option value="0">Select Drug Supplier</option>
                                                        <?php
                                                        $query = "SELECT * FROM drug_supplier";
                                                        $hmo = $app->fetch_query($query);

                                                        foreach ($hmo as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>">
                                                                <?php echo $data['supplier']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="drug_format"
                                                        id="drug_format">
                                                        <option>Select Stock Format</option>
                                                        <option>Tablet</option>
                                                        <option>Bottle</option>
                                                        <option>Amp</option>
                                                        <option>Vial</option>
                                                        <option>Card</option>
                                                        <option>Park</option>
                                                        <option>carton</option>


                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="brand_id"
                                                        id="brand_id">
                                                        <option value="0">Select Drug Brand</option>
                                                        <?php
                                                        //brand list
                                                        $hmo = $app->fetch_query($drug_brand_category);

                                                        foreach ($hmo as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>">
                                                                <?php echo $data['category_name']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-3 col-sm-12">
                                                <label>Production date</label>
                                                <div class="form-group">
                                                    <input type="datetime-local" class="form-control" id="prod_date"
                                                        name="prod_date">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label>Expiry date</label>
                                                <div class="form-group">
                                                    <input type="datetime-local" class="form-control"
                                                        id="expiration_date" name="expiration_date">
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-sm-12">
                                                <label>Cost price</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="cost_price"
                                                        name="cost_price" placeholder="Cost price">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <label>Selling price</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="sell_price"
                                                        name="sell_price" placeholder="Selling price">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-md-3 col-sm-12">
                                                <label>Aval Quantity Reminder</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="aq_reminder"
                                                        name="aq_reminder" placeholder="Aval Quantity Reminder">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <label>Batch No</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="batchno" name="batchno"
                                                        placeholder="Batch No">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="reset-btn" class="btn btn-primary">Add
                                                        Drug</button>
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
                let medicine = document.forms["myForm"]["medicine"].value;
                let qty = document.forms["myForm"]["qty"].value;
                let drug_category = document.forms["myForm"]["drug_category"].value;
                let supplier_id = document.forms["myForm"]["supplier_id"].value;
                let brand_id = document.forms["myForm"]["brand_id"].value;

                if (medicine === "") {
                    Swal.fire({
                        title: "The Medicine Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (drug_category == 0) {
                    Swal.fire({
                        title: "The Category Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (supplier_id === 0) {
                    Swal.fire({
                        title: "The Suppiler Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (medicine.length < 3) {
                    Swal.fire({
                        title: "Error!",
                        text: "Drug name must be at least 3 characters long.",
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
                        url: "ajax/add_medicine",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "success!",
                                    text: "Medicine added, Please wait redirecting...!",
                                    icon: "success",
                                });
                                setTimeout(function () {
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