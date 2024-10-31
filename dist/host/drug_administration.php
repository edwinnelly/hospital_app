<?php
include "config/checkers.php";
$get_staff_id = base64_decode($app->get_request('fid'));
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<body class="font-ubuntu h_menu">

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
                                <li class="breadcrumb-item">Patient</li>
                                <!-- <li class="breadcrumb-item active">Lab</li> -->
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;"> Drug Administration</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-default hidden-xs ml-2" data-toggle="modal" data-target="#defaultModal" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Print Result</button>
                            <button class="btn btn-warning hidden-xs ml-2" data-toggle="modal" data-target="#addPrescription" data-id="<?php echo (int) $get_staff_id;  ?>" id="pnt">Add Prescription</button>

                            <!-- <a href="add_patient_lab_profile.php?fid=<?php echo (int) $get_staff_id;  ?>"> <button class="btn btn-secondary hidden-xs ml-2">Add Test</button></a> -->
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
                                                        <th class="border-top-0">Name of Drug</th>
                                                        <th class="border-top-0">Date Prescribed</th>

                                                        <th class="border-top-0">Dose</th>
                                                        <th class="border-top-0">Frequency</th>
                                                        <th class="border-top-0">Start Date</th>

                                                        <th class="border-top-0">Finishing Date</th>
                                                        <th class="border-top-0">Status</th>

                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT da.id, da.drug_id, da.dose, da.frequency, da.start_date, da.end_date, da.presc_date, dl.drugs_name,da.status FROM drug_admin da JOIN drugs_list dl ON da.drug_id = dl.id WHERE da.patient_id = '$get_staff_id' ";
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
                                                                    <?= $fetch['presc_date']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?= $fetch['dose']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?= $fetch['frequency']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?= $fetch['start_date']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="mb-0">
                                                                    <?= $fetch['end_date']; ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($fetch['status'] == 'no') {
                                                                    echo "<span class='bg-warning p-1 rounded text-white'>To Start</span>";
                                                                } elseif ($fetch['status'] == 'started') {
                                                                    echo "<span class='bg-primary p-1 rounded text-white'>Started</span>";
                                                                } elseif ($fetch['status'] == 'discontinued') {
                                                                    echo "<span class='bg-danger p-1 rounded text-white'>Discontinued</span>";
                                                                } elseif ($fetch['status'] == 'completed') {
                                                                    echo "<span class='bg-success p-1 rounded text-white'>Completed</span>";
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Action
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="drug-chart?fid=<?php echo base64_encode($get_staff_id); ?>&&did=<?php echo base64_encode($fetch['drug_id']); ?>&&nam=<?php echo base64_encode($fetch['drugs_name']); ?>">Chart Drug</a></li>
                                                                        <li><a class="dropdown-item" href="#">Skip Dose</a></li>
                                                                        <li><a class="dropdown-item" href="#">Discontinue Medication</a></li>
                                                                        <li><a class="dropdown-item" href="#">View Vaccination</a></li>
                                                                        <a class="dropdown-item delete_emp"href="#" data-emp_name="<?php echo $fetch['drugs_name']; ?>" data-id="<?php echo $fetch['id']; ?>">Delete Prescription</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                let category_name = document.forms["myForm"]["drugs"].value;
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
                        url: "ajax/add_prescription",
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
        $(document).on('click', '.delete_emp', function () {
            //fetch data from data attribute
            const id = $(this).attr("data-id");
            const emp_name = $(this).attr("data-emp_name");

            // show in text field
            $("#emp_name").val(emp_name);
            $("#id").val(id);

            //call  modal
            $('#newmodal').modal('show');

            $("#delete_emp").click(function () {
                const emp_name_del = $("#emp_name").val();
                const id_del = $("#id").val();

                //disable the button
                const btn = $("#delete_emp");
                btn.attr('disabled', true).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
                //validate
                //call Ajax
                if (id_del === '' || id_del === 0) {
                    Swal.fire({
                        title: "success!",
                        text: "Invalid request, Please wait redirecting...!",
                        icon: "success",
                    });
                    const btn = $("#del_stf");
                    btn.attr('disabled', false).html('<i class="fa fa-spin fa-spinner"></i> Try Again...');
                } else {
                    $.ajax({
                        url: "ajax/delete-prescription",
                        method: "POST",
                        data: {
                            id_del: id_del
                        },
                        success: function (data) {
                            if (data.trim() == 'success') {

                                //hide  modal
                                $('#defaultModal2').modal('hide');

                                Swal.fire({
                                    title: "success!",
                                    text: "Deleted, Please wait redirecting...!",
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


<div class="modal fade" id="newmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Do You Want To Delete The Account</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emp_name" readonly>
                        <input type="hidden" class="form-control" id="id">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success btn-simple waves-effect" id="delete_emp"
                    data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-danger btn-simple waves-effect" data-bs-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPrescription" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Add Prescription</h5>
            </div>

            <div class="modal-body">
                <form name="myForm" id="myForm" method="post">
                    <input type="hidden" value="<?= $get_staff_id ?>" name="pid" id="pid">
                    <input type="hidden" value="<?= $staff_ids ?>" name="doctor" id="doctor">
                    <div class="col-md-7">
                        <div class="mt-3 form-group">
                            <label class="mb-3 fw-bold">Drug Name</label>
                            <select class="form-select" name="drugs" id="drugs">
                                <option value="" disabled selected>Add Drug</option>
                                <?php
                                $sql = "SELECT id, drugs_name FROM drugs_list";
                                $fetch_drug = $app->fetch_query($sql);
                                foreach ($fetch_drug as $drugs) {
                                ?>
                                    <option value="<?php echo $drugs['id'] ?>"><?php echo $drugs['drugs_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
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
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date">
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

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Print Patient Result</h5>
            </div>


            <div class="modal-body">
                <form method="get" action="patient_result.php">
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
