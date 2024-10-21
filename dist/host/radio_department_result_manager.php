<?php
include "config/checkers.php";
$department_test = "SELECT 
 patient_test_radio.*, 
 radio_graphy_test.*, 
 patient_test_radio.dated_created AS crdate
FROM 
 patient_test_radio
JOIN 
 radio_graphy_test ON patient_test_radio.test_id = radio_graphy_test.id
WHERE 
  patient_test_radio.status = 2
";
$fetch_dpt = $app->fetch_query($department_test);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Emr :: Departments</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
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

        <?php
        include "inc/nav.php";
        include "inc/header.php";
        include "inc/rightside.php";
        ?>
        <!-- Main Content -->
        <div class="body_area after_bg">

            <div class="block-header">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item">Test</li>
                                <li class="breadcrumb-item active">Departments</li>
                            </ul>
                            <h1 class="mb-1 mt-1">Radio Departments Cases / Approval</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_radio.php"><button class="btn btn-secondary hidden-xs">Patients
                                    Profile</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">SN</th>
                                                <th class="border-top-0">Test Names</th>
                                                <th class="border-top-0">SM</th>
                                                <th class="border-top-0">Creation Date</th>
                                                <th class="border-top-0">Time Tracker</th>
                                                <th class="border-top-0">Result</th>
                                                <th class="border-top-0">Action / Open</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sn = 1;
                                            foreach ($fetch_dpt as $fetch_dpt) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $sn++; ?>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">
                                                            <?php echo $fetch_dpt['sample']; ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">
                                                            <?php echo $fetch_dpt['passkey']; ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">
                                                            <?php
                                                            echo ($fetch_dpt['crdate']);
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">
                                                            <span class="badge badge-warning">
                                                                <?php echo $app->time_ago($fetch_dpt['crdate']); ?></span>
                                                        </p>
                                                    </td>


                                                    <td>
                                                        <h6>
                                                            <span class="badge badge-danger"><?php

                                                            echo 'Processing';

                                                            ?></span>
                                                        </h6>
                                                    </td>
                                                    <td>

                                                        <a href="radio_rs_approval.php?fid=<?php echo ($fetch_dpt['passkey']); ?>"><img src="../open.webp"  height="30" style="cursor: pointer"
                                                            data-smkey='<?php echo $fetch_dpt['passkey']; ?>'></a>


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

        <!-- Default Size -->

    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.delete_emp', function () {
            //fetch data from data attribute
            const smkey = $(this).attr("data-smkey");
            const result1 = $(this).attr("data-result");
            const commemt1 = $(this).attr("data-commemt");

            // show in text field
            $("#smkey").val(smkey);
            $("#result").val(result1);
            $("#commemt").val(commemt1);

            //call  modal
            $('#defaultModal').modal('show');

            $("#myForm").on('submit', (function (e) {

                e.preventDefault();
                var btn = $("#reset-btn");
                btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                var datas = new FormData(this);
                $.ajax({
                    url: "ajax/upload_radio_test_result",
                    type: "post",
                    data: datas,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {
                        if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Result uploaded, Please wait redirecting...!",
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


            }));




        });
    </script>


</body>

</html>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Result Approval</h5>
            </div>
            <div class="modal-body">

                <form name="myForm" id="myForm" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>To continue enter the SM Key</label>
                            <input type="text" class="form-control" id="smkey" name="smkey" readonly>

                        </div>
                        <div class="form-group">
                            <label>Enter the Result Description</label>
                            <textarea type="text" class="form-control" id="result"
                                placeholder="Enter Result Description" name="result" required></textarea>

                        </div>

                        <div class="form-group">
                            <label>Image one</label>
                            <img src="" alt="">
                        </div>
                        <div class="form-group">
                            <label>Image two</label>
                            <input type="file" class="form-control" name="file2" id="file2">
                        </div>
                        <div class="form-group">
                            <label>Image three</label>
                            <input type="file" class="form-control" name="file3" id="file3">
                        </div>

                        <div class="form-group">
                            <label>Image four</label>
                            <input type="file" class="form-control" name="file4" id="file4">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="reset-btn" class="btn btn-primary" style="color:black">Upload Result</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
            </form>

        </div>
    </div>
</div>