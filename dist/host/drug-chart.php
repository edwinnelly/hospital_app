<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));
$get_drug = base64_decode($app->get_request('did'));
$get_drug_name = base64_decode($app->get_request('nam'));
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Emr :: Lab Setup </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu h_menu">

    <div id="body" class="theme-blue">

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
                                <li class="breadcrumb-item">Patient</li>
                                <!-- <li class="breadcrumb-item active">Lab</li> -->
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;">Drug Chart</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-default hidden-xs ml-2" data-toggle="modal" data-target="#defaultModal" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Print Result</button>
                            <button class="btn btn-warning hidden-xs ml-2" data-toggle="modal" data-target="#newmodal" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Add Drug Chart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="body d-flex">
                                <div class="profile-image mr-4">
                                    <img src="../profile_pic/<?php echo ($data['photo']);  ?>" class="w90 rounded-circle shadow" alt="" style="">

                                </div>
                                <div class="details">
                                    <h5 class="mt-0 mb-0"><strong><?php echo $data['patient_name'];  ?></strong></h5>
                                    <span class="text-muted font-13"><?php echo htmlspecialchars($data['hmo_name']);  ?></span>
                                    <p class="mb-1"><?php echo htmlspecialchars($data['address']);  ?></p>
                                    <a href="drug_administration?fid=<?php echo base64_encode($get_staff_id); ?>"><button class="btn btn-primary"> Go back to drug administration</button></a>
                                </div>
                            </div>


                            <div id="notificationContainer" style="width:500px"></div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="body">
                                        <div class="table-responsive">

                                            <table
                                                class="table table-bordered table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0">SN</th>
                                                        <th class="border-top-0">Drug Name</th>
                                                        <th class="border-top-0">Dose</th>
                                                        <th class="border-top-0">Frequency</th>
                                                        <th class="border-top-0">Date</th>
                                                        <th class="border-top-0">Status</th>
                                                        <th class="border-top-0">Comment</th>
                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT dc.id, dc.drug_id, dc.status, dc.frequency, dc.doses, dc.chart_date, dc.comment, dl.drugs_name FROM drug_charting dc JOIN drugs_list dl ON dc.drug_id = dl.id WHERE dc.patient_id = '$get_staff_id' AND dc.drug_id='$get_drug'";
                                                    $fetch_dpt = $app->fetch_query($sql);
                                                    $sn = 1;
                                                    foreach ($fetch_dpt as $fetch) {

                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?= $sn++; ?>
                                                            </td>
                                                            <td>
                                                                <p class="">
                                                                    <?php echo $fetch['drugs_name'] ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="">
                                                                    <?php echo $fetch['doses'] ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="">
                                                                    <?php echo $fetch['frequency'] ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?php echo $fetch['chart_date'] ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">
                                                                    <?php
                                                                    if ($fetch['status'] == 'charted') {
                                                                        echo "<span class='bg-warning p-1 rounded text-white'>Charted</span>";
                                                                    } elseif ($fetch['status'] == 'skipped') {
                                                                        echo "<span class='bg-secondary p-1 rounded text-white'>Skipped</span>";
                                                                    } elseif ($fetch['status'] == 'discontinued') {
                                                                        echo "<span class='bg-danger p-1 rounded text-white'>Discontinued</span>";
                                                                    } elseif ($fetch['status'] == 'completed') {
                                                                        echo "<span class='bg-success p-1 rounded text-white'>Completed</span>";
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">
                                                                    <?php echo $fetch['comment'] ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Action
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <!-- <li><a class="dropdown-item delete_emp" href="#">Chart Drug</a></li> -->
                                                                        <li><a class="dropdown-item delete_emp" data-id="<?php echo $fetch['id'] ?>" data-emp_name="<?php echo $fetch['drugs_name'] ?>">Skip Dose</a></li>
                                                                        <li><a class="dropdown-item" href="#">Discontinue Medication</a></li>
                                                                    </ul>
                                                                </div>
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
                    </div>


                    <div class="col-lg-12">

                        <div class="card">
                            <div id="notificationContainer" style="width:500px"></div>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/datatablescripts.bundle.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function validateForm() {
                let category_name = document.forms["myForm"]["dose"].value;
                if (category_name === "") {
                    Swal.fire({
                        title: "Empty, Please Input Needed Field",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                return true; // Form is valid
            }

            $("#myForm").on('submit', function(e) {
                let check = validateForm();
                e.preventDefault();
                if (check) {
                    var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_chart",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data.trim() == "success") {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Created Successfully!",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    var btn = $("#reset-btn");
                                    btn.attr("disabled", false).html("Created Successfully!");
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Error",
                                    icon: "error",
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        },
                    });
                }
            });
        });
    </script>

    <script>
    $(document).on('click', '.delete_emp', function() {
    // Fetch data from data attribute
    const id = $(this).attr("data-id");
    const emp_name = $(this).attr("data-emp_name");

    // Show in text field
    $("#emp_name").val(emp_name);
    $("#ids").val(id);

    // Call modal
    $('#newmodals').modal('show');

    $("#delete_emps").off('click').on('click', function() { // Use .off() to prevent duplicate event binding
        const id_dels = $("#ids").val();

        // Disable the button
        const btn = $("#delete_emps");
        btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

        // Validate and call Ajax
        if (id_dels === '' || id_dels === 0) {
            Swal.fire({
                title: "Error!",
                text: "Invalid request, please try again!",
                icon: "error",
            });
            btn.attr('disabled', false).html('Skip Dose');
        } else {
            $.ajax({
                url: "ajax/skipped-doses.php",  // Make sure the file path is correct
                method: "POST",
                data: {
                    ids: ids
                },
                success: function(data) {
                    alert(data);
                    if (data.trim() === 'success') {
                        // Hide modal
                        $('#newmodals').modal('hide');

                        Swal.fire({
                            title: "Success!",
                            text: "Dose skipped successfully!",
                            icon: "success",
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong!",
                            icon: "error",
                        });
                        btn.attr('disabled', false).html('Skip Dose');
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "AJAX request failed!",
                        icon: "error",
                    });
                    btn.attr('disabled', false).html('Skip Dose');
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
                <h5 class="title" id="defaultModalLabel">Print Patient Result</h5>
            </div>


            <div class="modal-body">
                <form method="get">
                    <input type="hidden" value="<?= base64_encode($get_staff_id);   ?>" name="pid" id="pid">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label> From</label>
                            <input type="datetime-local" class="form-control" name="starts">
                        </div>

                        <div class="form-group">
                            <label>To</label>
                            <input type="datetime-local" class="form-control" name="ends">
                            <input type="hidden" class="form-control" id="id">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">

                <input type="submit" class="btn btn-success btn-simple waves-effect" id="delete_emp" value="Continue">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="newmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Add Drug chat</h5>
            </div>

            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <input type="hidden" value="<?= $get_staff_id ?>" name="pid" id="pid">
                    <input type="hidden" value="<?= $staff_ids ?>" name="doctor" id="doctor">
                    <div class="col-lg-12">
                        <div class="mt-3 form-group">
                            <label class="mb-3 fw-bold">Drug Name</label>
                            <input type="text" value="<?= $get_drug_name ?>" class="form-control" readonly>
                            <input type="hidden" value="<?= $get_drug ?>" name="id_del" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Dose</label>
                            <input type="text" class="form-control" name="dose" placeholder="Dose(mg)" id="dose">
                        </div>
                        <div class="form-group">
                            <label>Frequency</label>
                            <input type="text" class="form-control" name="frequency" placeholder="Frequency" id="frequency">
                        </div>
                        <div class="form-group">
                            <label>Charted Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comments" id="" cols="20" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-simple waves-effect text-white" value="Add Drugs" id="reset-btn">
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-dismiss="modal">X</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="newmodals" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Skip The Dose For Today?</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emp_name" readonly>
                        <input type="text" class="form-control"  id="ids" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emps">Skip Dose</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-bs-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>