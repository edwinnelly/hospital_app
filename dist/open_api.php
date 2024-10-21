<?php
session_start();
include_once "host/config/controller.php";
include "sql/sql.php";
$app = new controller;
$users_ids = $_SESSION['email'];
$user_log = $app->checkLogin();
if ($user_log == "logged") {
    // echo "ok";
} else {
    echo '<script>window.location.href="sign-in";</script>';
}
//Get user info
$query = "select id,access_level_id,username,photo from staffs_accounts where email_address='$users_ids'";

$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);
// var_dump($userInfo);
 $id = $userInfo['id'];
 $access_level_id = $userInfo['access_level_id']; //access
 $username = $userInfo['username']; //username
$photo = $userInfo['photo']; //photo

if ($access_level_id == 1) {
    echo '<script>window.location.href="host/dashboard.php";</script>';
} elseif ($access_level_id == 2) {
    echo '<script>window.location.href="r/dashboard.php";</script>';
} elseif ($access_level_id == 3) {
    echo '<script>window.location.href="sign-in";</script>';
} elseif ($access_level_id == 4) {
    echo '<script>window.location.href="sign-in";</script>';
} elseif ($access_level_id == 5) {
    echo '<script>window.location.href="sign-in";</script>';
}


