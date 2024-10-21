<?php
include "../config/controller.php";
$app = new controller;
$fn = $app->post_request('fn');
$ln = $app->post_request('ln');
$email = $app->post_request('email');
$dpt = $app->post_request('dpt');
$specialist = $app->post_request('specialist');
$acc_type = $app->post_request('acc_type');
$gender = $app->post_request('gender');
$phone = $app->post_request('phone');
$username = $app->post_request('username');
$marital_status = $app->post_request('marital_status');
$staff_id = $app->post_request('staff_ids');
$address = $app->post_request('address');

if (isset($fn, $ln, $email)) {
    $query = "update staffs_accounts set email_address='$email',firstname='$fn',lastname='$ln',username='$username',marital_status='$marital_status',access_level_id='$acc_type',specialist_id='$specialist',department_id='$dpt',phone='$phone',address='$address' where staff_id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}