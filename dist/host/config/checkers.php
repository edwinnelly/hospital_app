<?php
// Set security headers
// header('Content-Security-Policy: default-src \'self\'');
// header('X-Content-Type-Options: nosniff');
// header('X-Frame-Options: DENY');
// header('X-XSS-Protection: 1; mode=block');
?>

<?php
session_start();
include_once "config/controller.php";
include "sql/sql.php";
$app = new controller;
$users_ids = $_SESSION['email'];
$lock = $_SESSION['e_secure'];
$user_log = $app->checkLogin();
if ($user_log == "logged") {
    // echo "ok";
} else {
    $app->logout();
    echo '<script>window.location.href="../sign-in";</script>';
}
//Get user info
$query = "select id,access_level_id,login_sec,specialist_id,username,photo,staff_id,hmo_key from staffs_accounts where email_address='$users_ids'";
$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);

// var_dump($userInfo);
$id = $userInfo['id'];
$access_level_id = $userInfo['access_level_id']; //access
$username = $userInfo['username']; //username
$photo = $userInfo['photo']; //photo
$staff_ids = $userInfo['staff_id']; //photo
$login_sec_check = $userInfo['login_sec']; //photo
$hmo_key = $userInfo['hmo_key'];
$specialist_id = $userInfo['specialist_id'];
//lock system is the key changes
if ($login_sec_check === $lock) {
} else {
    $app->logout();
    echo '<script>window.location.href="../sign-in";</script>';
}

if ($access_level_id == 1) {
} else {
    $app->logout();
    echo '<script>window.location.href="../sign-in";</script>';
}

//Get hmo info
$query_hmo = "select * from hmo where id='$hmo_key'";
$userInfos_hmo = $app->fetch_query($query_hmo);
foreach ($userInfos_hmo as $userInfo_hmos);
$hmo_name = $userInfo_hmos['hmo_name'];
