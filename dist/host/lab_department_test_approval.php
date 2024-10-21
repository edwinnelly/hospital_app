<?php
include "config/checkers.php";
$fetch_dpt = base64_decode($app->get_request('fid'));
$department_test = "SELECT patient_test.*,lab_test_case.*,patient_test.dated_created as crdate from patient_test JOIN lab_test_case ON patient_test.test_id=lab_test_case.id WHERE patient_test.dpt=$fetch_dpt and patient_test.status=3
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
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
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
                            <h1 class="mb-1 mt-1">Lab Departments Cases</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="patient_all_lab.php"><button class="btn btn-secondary hidden-xs">Patients
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
                                                <th class="border-top-0">TAT</th>
                                                <th class="border-top-0">Result</th>
                                                <th class="border-top-0">Action</th>
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
                                                            <?php echo $fetch_dpt['test_name']; ?>
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
                                                                <?php echo $app->time_ago($fetch_dpt['crdate']); ?>
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <span class="badge badge-warning">
                                                                <?php

                                                                echo ($fetch_dpt['tat']);

                                                                ?>
                                                            </span> Hours
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            <span class="badge badge-danger">
                                                                <?php

                                                                echo ($fetch_dpt['result']);

                                                                ?>
                                                            </span>
                                                        </h6>
                                                    </td>
                                                    <td>

                                                        <img src="upload.png" height="40" style="cursor: pointer"
                                                            data-smkey='<?php echo $fetch_dpt['passkey']; ?>'
                                                            data-result='<?php echo $fetch_dpt['result']; ?>'
                                                            data-commemt='<?php echo $fetch_dpt['comments']; ?>'
                                                            class="delete_emp">
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

            $("#delete_emp").click(function () {
                const smkey_val = $("#smkey").val();
                const result = $("#result").val();
                const commemt = $("#commemt").val();
                const result_approve = $("#result_approve").val();
                const host = $("#host").val();
                
                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                //validate
                //call Ajax
                if (smkey_val === '' || smkey_val === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/upload_test_result_dpthod",
                        method: "POST",
                        data: {
                            smkey_val: smkey_val, result: result, commemt: commemt,result_approve:result_approve,host:host
                        },
                        success: function (data) {
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "The Test Result Has Been Sent To Head Of Department For Approval----, Please wait redirecting...!",
                                    icon: "success",
                                });

                                setTimeout(function () {
                                    location.reload();
                                }, 3000);


                            }
                        }
                    });

                }

            });

        });
    </script>



</body>

</html>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Upload Result </h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>To continue enter the SM Key</label>
                        <input type="text" class="form-control" id="smkey" readonly>
                        <input type="text" class="form-control" id="host" value="<?=  $staff_ids;  ?>">

                    </div>
                    <div class="form-group">
                        <label>Enter the Result Here</label>
                        <input type="text" class="form-control" id="result">

                    </div>

                    <div class="form-group">
                        <label>Enter Comment Here</label>
                        <input type="text" class="form-control" id="commemt">
                    </div>

                    <div class="form-group">
                    <label>Approve Result</label>
                        <select class="form-control show-tick" id="result_approve" name="result_approve">
                            <option value="4">Approved</option>
                            <option value="3">Not Approved</option>
                            <option value="5">Re-run</option>
                        </select>
                    </div>

                   
                
            </div>
        </div>
        <div class="modal-footer">
            <img src="approved.webp" height="40" style="cursor: pointer;" id="delete_emp">
            <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
        </div>
    </div>
</div>
</div>