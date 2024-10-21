<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Auth">

    <title>:: User Auth :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/amaze.style.min.css">
</head>

<body class="font-ubuntu">

    <div id="body" class="theme-blue">

        <div class="authentication">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12">
                        <div class="company_detail">
                            <h4 class="logo"><img class="mr-2" src="assets/images/logo.svg" alt="Logo"> Maxsomware</h4>
                            <h3>Hospital<strong> EMR system  </strong> plays a critical role in improving patient care
                            </h3>
                            <p>A Hospital EMR system plays a critical role in improving patient care, enhancing
                                operational efficiency, and ensuring
                                regulatory compliance within healthcare organizations.</p>
                            <div class="footer">
                                <ul class="social_link list-unstyled">
                                    <li><a href="" title="ThemeMakker"><i class="zmdi zmdi-globe"></i></a></li>
                                    <li><a href="" title="Themeforest"><i class="zmdi zmdi-shield-check"></i></a></li>
                                    <li><a href="" title="LinkedIn"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="" title="Behance"><i class="zmdi zmdi-behance"></i></a></li>
                                    <li><a href="" title="dribbble"><i class="zmdi zmdi-dribbble"></i></a></li>
                                </ul>
                                <hr>
                                <p class="copyright font-12">Copyright 2024 © All Rights Reserved. Maxsomware Portal</p>
                                <ul class="list-unstyled d-inline-flex mt-2">
                                    <li class="mr-3"><a href="">Contact Us</a></li>
                                    <li class="mr-3"><a href="">About Us</a></li>
                                    <li class="mr-3"><a href="">Services</a></li>
                                    <li class="mr-3"><a href="">Licenses</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-plain ml-auto">
                            <div class="header">
                                <h5>Log in</h5>
                            </div>
                            <div id="notificationContainer"></div>
                            <form name="myForm" id="myForm" method="post" class="form mt-5">

                                <div class="form-group mb-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email / User Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <a href="" class="link font-13 float-right">Forgot Password?</a>
                                </div>
                                <div class="mt-4">
                                    <label class="c_checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="ml-2">Keep me logged in</span>
                                    </label>
                                </div>


                                <div class="footer mt-3">

                                    <button type="submit" id="reset-btn" class="btn btn-block btn-primary">Sign
                                        in</button>
                                </div>
                            </form>
                            <span>Don't have an account? <a href="" class="link">Sign up</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="auth.js"> </script>
    
</body>

</html>