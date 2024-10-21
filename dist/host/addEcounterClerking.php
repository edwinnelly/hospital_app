<?php
include "config/checkers.php";
$get_staff_id = $app->get_request('fid');
$get_staff_name = $app->get_request('st');
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
    ;
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Amaze Bootstrap4 Admin ::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/amaze.style.min.css">

    
    <!-- Morris Chart Css-->
    <link rel="stylesheet" href="../assets/plugins/morrisjs/morris.css" />
    <!-- Colorpicker Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <!-- Multi Select Css -->
    <link rel="stylesheet" href="../assets/plugins/multi-select/css/multi-select.css">
    <!-- Bootstrap Spinner Css -->
    <link rel="stylesheet" href="../assets/plugins/jquery-spinner/css/bootstrap-spinner.css">
    <!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- noUISlider Css -->
    <link rel="stylesheet" href="../assets/plugins/nouislider/nouislider.min.css" />
   

</head>

<body class="font-ubuntu">

    <div id="body" class="theme-blue">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <!-- <div class="mt-3"><img class="zmdi-hc-spin w60" src="assets/images/loader.svg" alt="Amaze"></div> -->
                <p>Please wait...</p>
            </div>
        </div>

        <div class="overlay"></div>

        <?php
        include "inc/nav.php";
        include "inc/header.php";
        include "inc/rightside.php";
        ?>

        <!-- Main Content -->
        <div class="body_area">

            <div class="block-header">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <ul class="breadcrumb pl-0 pb-0 ">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item">New</li>
                                <li class="breadcrumb-item active">Clerking</li>
                            </ul>
                            <h1 class="mb-1 mt-1">New Clerking</h1>
                        </div>
                        <div class="col-lg-6 col-md-12 text-md-right">
                            <button class="btn btn-default hidden-xs ml-2">Encounters</button>
                            <button class="btn btn-secondary hidden-xs ml-2">New Clerking</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- CKEditor -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2> <strong>Clerking</strong></h2>
                            </div>
                            <div class="body">
                            <form name="myForm" id="myForm" method="post">
                                    <div class="form-group">
                                        <label for="summernote">Complaints</label>
                                        <textarea class="form-control summernote" id="summernote" name="complaints">

                                        <h5>Presenting complaint</h5>
                                        <p>...</p>
                                        <h5>History of presenting complaint</h5>

                                        <p>...</p>

                                        <h5>Past Medical and Surgical History</h5>

                                        <p>...</p>
                                        
                                        <h5>Gynecologic and Obstetric Hx</h5>

                                        <p>...</p>

                                        <h5>Drug and Allergy History</h5>

                                        <p>...</p>
                                        <h5>Family and social History</h5>

                                        <p>...</p>
                                        <h5>Review of system</h5>

                                        <p>...</p>


                                        </textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="summernote">Examination</label>
                                        <textarea class="form-control summernote" id="summernote" name="examination">

                                        <h5>General examination</h5>
                                        <p>...</p>
                                        <h5>CVS examination</h5>

                                        <p>...</p>

                                        <h5>Respiratory examination</h5>

                                        <p>...</p>
                                        
                                        <h5>Abdominal examination</h5>

                                        <p>...</p>

                                        <h5>CNS examination</h5>

                                        <p>...</p>
                                        <h5>Obstetric examination</h5>

                                        <p>...</p>
                                        <h5>Gynecologic examination</h5>

                                        <p>...</p>

                                        <h5>Others</h5>

                                        <p>...</p>


                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="summernote">Diagnosis</label>
                                        <textarea class="form-control summernote" id="summernote" name="diagnosis">

                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="Plan">Clerking Plan</label>
                                        <input type="text" id="plan" class="form-control" name="plan" placeholder="Plan"
                                            required>
                                    </div>


                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <p> <b>Lab investigation</b> </p>
                                            <select class="form-control z-index show-tick" name="lab[]" multiple data-live-search="true">
                                            <?php
                                                        $fetch_dpt = $app->fetch_query($lab_test_list_sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {  
                                                            ?>  
                                            <option value="<?= $fetch_dpt['id']; ?>"><?= $app->stringFormat($fetch_dpt['test_name'],25); ?></option>
                                             
                                                <?php
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>  
                                    
                                    <br>
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <p> <b>Imaging investigations</b> </p>
                                            <select class="form-control z-index show-tick" name="imaging[]" multiple data-live-search="true">
                                            <?php
                                                        $fetch_dpt = $app->fetch_query($radio_test_list_sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {  
                                                            ?>  
                                            <option value="<?= $fetch_dpt['id']; ?>"><?= $app->stringFormat($fetch_dpt['sample'],25); ?></option>
                                             
                                                <?php
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>  

<br>
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <p> <b>Prescription</b> </p>
                                            <select class="form-control z-index show-tick" multiple data-live-search="true">
                                            <?php
                                                        $fetch_dpt = $app->fetch_query($drug_lists_sql);
                                                        $sn = 1;
                                                        foreach ($fetch_dpt as $fetch_dpt) {  
                                                            ?>  
                                            <option value="<?= $fetch_dpt['id']; ?>"> <?php echo $fetch_dpt['drugs_name']; ?></option>
                                             
                                                <?php
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div> 

<br><button type="submit" id="reset-btn" class="btn btn-primary">New Clerking</button>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# CKEditor -->
                <div class="row clearfix">
                    <div class="col-md-12 col-lg-12">
                    <?php
                include "inc/footer.php";
                ?>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../assets/plugins/summernote/dist/summernote.js"></script>
    <script src="../js/pages/forms/advanced-form-elements.js"></script>

    <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js -->
    <script src="../assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js -->
    <script src="../assets/plugins/jquery-spinner/js/jquery.spinner.js"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../assets/plugins/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js -->


    <script>
        jQuery(document).ready(function () {

            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false, // set focus to editable area after initializing summernote
                popover: { image: [], link: [], air: [] }
            });

            $('.inline-editor').summernote({
                airMode: true
            });

        });

        window.edit = function () {
            $(".click2edit").summernote()
        },
            window.save = function () {
                $(".click2edit").summernote('destroy');
            }
    </script>

    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        }
        else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
    // ]]>
    </script>
    


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //validate email
        $(document).ready(function () {
            // function validateForm() {
            //     let dpt = document.forms["myForm"]["dpt"].value;
            //     // let dpt_head = document.forms["myForm"]["dpt_head"].value;

            //     if (dpt === "") {
            //         Swal.fire({
            //             title: "The Profie Name Can Not Be Empty",
            //             text: "Try Again!",
            //             icon: "error"
            //         });
            //         return false;
            //     }


            //     if (dpt.length < 5) {
            //         Swal.fire({
            //             title: "Error!",
            //             text: "Profile name must be at least 8 characters long.",
            //             icon: "error",
            //         });
            //         return false;
            //     }

            //     return true; // Form is valid
            // }
            /* function to login user */
            $("#myForm").on('submit', (function (e) {
                
                e.preventDefault();
                var btn = $("#reset-btn");
                    btn.attr('disabled', true).html("<i class='fa fa-spin fa-spinner'></i> Processing");
                    var datas = new FormData(this);
                    $.ajax({
                        url: "ajax/add_encounter_clacking",
                        type: "post",
                        data: datas,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: (data) => {
                            console.log(data);
                            if (data.trim() == "success") {
                                // Swal.fire({
                                //     title: "success!",
                                //     text: "Profile Created, Please wait redirecting...!",
                                //     icon: "success",
                                // });
                                // setTimeout(function () {
                                //     var btn = $("#reset-btn");
                                //     btn
                                //         .attr("disabled", false)
                                //         .html("Profile Created!");
                                //     location.href = "hmo_profiling";
                                // }, 3000);
                            } else {
                                // Swal.fire({
                                //     title: "Error!",
                                //     text: "Posting Failed try again!",
                                //     icon: "error",
                                // });
                            }
                        },
                    });
                

            }));

        });
    </script>
</body>

</html>