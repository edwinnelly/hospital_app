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
$staff_id = rand(1234, 12345);
$formattedDate = date('Y-m-d H:i:s');
if(isset($fn,$ln,$email)){
    $query = "INSERT INTO `staffs_accounts` (`id`, `staff_id`, `username`, `firstname`, `lastname`, `age`, `qualification`, `department_id`, `occupation`, `sex`, `marital_status`, `phone`, `email_address`, `password`, `next_of_kin`, `religion`, `tribe`, `salary`, `state_of_origin`, `nationality`, `photo`, `specialist_id`, `access_level_id`, `date_added`) VALUES (NULL, '$staff_id', '$username', '$fn', '$ln', NULL, NULL, '$dpt', NULL, '$gender', '$marital_status', '$phone', '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$specialist', '$acc_type', '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




