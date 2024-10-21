<?php
include "config/checkers.php";

 $get_staff_id = $app->get_request('fid');
 $get_staff_name = $app->get_request('st');

 //sql command
$edit_employee_sql = "SELECT * FROM staffs_accounts JOIN department ON staffs_accounts.department_id = department.id JOIN specializations ON staffs_accounts.specialist_id = specializations.id WHERE staffs_accounts.staff_id=$get_staff_id";

$get_staff_data = $app->fetch_query($edit_employee_sql);
foreach($get_staff_data as $get_staff_details);
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:Edit Employee</title>
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
                                <li class="breadcrumb-item">Employee</li>
                                <li class="breadcrumb-item active">Update</li>
                            </ul>
                            <h1 class="mb-1 mt-1" style="text-transform: capitalize;"><?php echo htmlentities(base64_decode($get_staff_name));  ?></h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <a href="emp-all"><button class="btn btn-default hidden-xs ml-2">Manage Employee</button></a>
                            <a href="employee_add.php"> <button class="btn btn-secondary hidden-xs ml-2">Add Employee</button></a>
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
                                <img src="../profile_pic/<?php echo ($get_staff_details['photo']);  ?>" alt="" style="max-height: 100px;max-width:100px;border-radius: 10%;">
                                
                            </div>
                            <div class="details">
                                <h5 class="mt-0 mb-0"><strong><?php echo htmlentities(base64_decode($get_staff_name));  ?></strong></h5>
                                <span class="text-muted font-13"><?php echo htmlspecialchars($get_staff_details['department_name']);  ?></span>
                                <p class="mb-1"><?php echo htmlspecialchars($get_staff_details['address']);  ?></p>
                                <p class="social-icon">
                                    <a class="px-2" title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                    <a class="px-2" title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                                    <a class="px-2" title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                    <a class="px-2" title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                                    <a class="px-2" title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                                </p>                                
                                <div class="mt-2">
                                    <button class="btn btn-sm btn-primary">User Log</button>
                                    <button class="btn btn-sm btn-default">Message</button>
                                </div>
                            </div>
                        </div>



                            <div id="notificationContainer" style="width:500px"></div>
                            <form name="myForm" id="myForm" method="post">
                                <form name="myForm" id="myForm" method="post" class="form mt-5">
                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input type="text" id="fn" class="form-control" value="<?php echo ($get_staff_details['firstname']);  ?>" name="fn"
                                                        placeholder="First Name">
                                                </div>
                                            </div>

                                            <input type="hidden" value="<?php echo $get_staff_id;   ?>" name="staff_ids" id="staff_ids">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="ln" value="<?php echo ($get_staff_details['lastname']);  ?>" name="ln"
                                                        placeholder="Last Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="address" value="<?php echo ($get_staff_details['address']);  ?>" name="address"
                                                        placeholder="Personal Address">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" id="dpt" name="dpt">
                                                        <!-- <option value="0">Select Department</option> -->
                                                        <option style="color:red" value="<?php echo ($get_staff_details['department_id']);  ?>"><?php echo ($get_staff_details['department_name']);  ?></option>
                                                        <?php
                                                        $dpt = $app->fetch_query($department_sql);
                                                        foreach ($dpt as $department) {
                                                        ?>
                                                        <option value="<?=  $department['id']; ?>"><?=  $department['department_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="specialist"
                                                        id="specialist">
                                                       
                                                        <option value="<?php echo ($get_staff_details['specialist_id']);  ?>"><?php echo htmlspecialchars($get_staff_details['specializations_name']);  ?></option>
                                                        <?php
                                                        $specializations = $app->fetch_query($specializations_sql);
                                                        foreach ($specializations as $specializations) {
                                                        ?>
                                                        <option value="<?=  $specializations['id']; ?>"><?=  ($specializations['specializations_name']); ?></option>
                                                        
                                                        <?php
}
?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="acc_type"
                                                        id="acc_type">
                                                        <option value="<?=  $get_staff_details['access_level_id']; ?>">Select Account Type</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Lab</option>
                                                        <option value="3">Nurse</option>
                                                        <option value="4">Radiology</option>
                                                        <option value="5">Doctor</option>
                                                        <option value="6">Front Desk</option>
                                                        <option value="7">Pharmacy</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" id="gender" name="gender">
                                                        <option value="<?php echo ($get_staff_details['sex']);  ?>"><?php echo ($get_staff_details['sex']);  ?></option>
                                                        <option>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-3 col-sm-12">
                                                <label>Phone Number</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo ($get_staff_details['phone']);  ?>" id="phone" name="phone"
                                                        placeholder="Phone Number">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <label>Email Address</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" value="<?php echo ($get_staff_details['email_address']);  ?>" id="email" name="email"
                                                        placeholder="Email Address">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <label>Username</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo ($get_staff_details['username']);  ?>" id="username"
                                                        name="username" placeholder="Username">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-12">
                                                <label>Select Marital Status</label>
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="marital_status"  id="marital_status">
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Divorced</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row clearfix">
                                            

                                            <div class="col-sm-12">
                                                <div class="mt-4">
                                                    <button type="submit" id="basic" class="btn btn-primary">Update Record</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>


                    <div class="col-lg-12">

<div class="card">
    <div id="notificationContainer" style="width:500px"></div>
    <form name="myForm123" id="myForm123" method="post">
        <form name="myForm2" id="myForm2" method="post" class="form mt-5">
            <div class="body">
                <div class="row clearfix">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" id="qualification" class="form-control" value="<?php echo ($get_staff_details['qualification']);  ?>"  name="qualification"
                                placeholder="Qualification">
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $get_staff_id;   ?>" name="staff_ids1" id="staff_ids1">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="occupation" value="<?php echo ($get_staff_details['occupation']);  ?>" name="occupation"
                                placeholder="Occupation">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" value="<?php echo ($get_staff_details['next_of_kin']);  ?>"
                                placeholder="Next of kin">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tribe" name="tribe" value="<?php echo ($get_staff_details['tribe']);  ?>"
                                placeholder="Tribe">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="salary" name="salary" value="<?php echo ($get_staff_details['salary']);  ?>"
                                placeholder="Salary">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="state_of_origin" value="<?php echo ($get_staff_details['state_of_origin']);  ?>" name="state_of_origin"
                                placeholder="State of origin">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo htmlspecialchars($get_staff_details['nationality']);  ?>" name="state_of_origin"
                                placeholder="Nationality">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <select class="form-control show-tick" name="religion" id="religion">
                                <option><?php echo htmlspecialchars($get_staff_details['religion']);  ?></option>
                                <option value="Christain">Christain</option>
                                <option value="Islam">Islam</option>
                                <option value="Other">Other</option>
                                         
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    

                </div>

                <div class="row clearfix">
                    
                    <div class="col-sm-12">
                        <div class="mt-4">
                            <button type="submit" id="advanced_btn" class="btn btn-primary">Update
                                Record</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

</div>



<div class="card">
    <div id="notificationContainer" style="width:500px"></div>
    <form name="myForm009" id="myForm009" method="post" enctype="multipart/form-data">
       
            <div class="body">
               
                <div class="row clearfix">
                    <div class="col-12">
                        <input type="file" name="file">
                        <div class="mt-3"></div>
                    </div>
                    <input type="hidden" value="<?php echo $get_staff_id;   ?>" name="staff_ids11" id="staff_ids11">
                    <div class="col-sm-12">
                        <div class="mt-4">
                            <button type="submit" id="upload-btn" class="btn btn-primary">Update
                                Profile Picture</button>
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
                let fn = document.forms["myForm"]["fn"].value;
                let ln = document.forms["myForm"]["ln"].value;
                let phone = document.forms["myForm"]["phone"].value;
                let username = document.forms["myForm"]["username"].value;
                let email = document.forms["myForm"]["email"].value;

                if (fn === "") {
                    Swal.fire({
                        title: "The First Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (ln === "") {
                    Swal.fire({
                        title: "The Last Name Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }
                if (phone === "") {
                    Swal.fire({
                        title: "The Phone Number Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (email === "") {
                    Swal.fire({
                        title: "The Email address Can Not Be Empty",
                        text: "Try Again!",
                        icon: "error"
                    });
                    return false;
                }

                if (username.length < 5) {
                    Swal.fire({
                        title: "Error!",
                        text: "Username must be at least 8 characters long.",
                        icon: "error",
                    });
                    return false;
                }

                return true; // Form is valid
            }

            /* update basic info */
            $("#myForm").on('submit', (function (e) {
                // alert("eddwards");
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#basic");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/employee_info1",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Account Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#basic");
                                btn
                                .attr("disabled", false)
                                .html("Update Account");
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

            //advanced settings
            $("#myForm123").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#advanced_btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/employee_info2",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Account Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#advanced_btn");
                                btn
                                .attr("disabled", false)
                                .html("Update Account");
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


            //file upload function
            $("#myForm009").on('submit', (function (e) {
                validateForm();
                let check = validateForm();
                e.preventDefault();
                if (check == true) {
                    var btn = $("#upload-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Uploading");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/employee_pic",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                          
                            if (data.trim() == "success") {
                            Swal.fire({
                                title: "success!",
                                text: "Profile Picture Updated, Please wait redirecting...!",
                                icon: "success",
                            });
                                setTimeout(function () {
                                var btn = $("#upload-btn");
                                btn
                                .attr("disabled", false)
                                .html("Update Account");
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