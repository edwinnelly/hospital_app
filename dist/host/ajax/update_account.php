<?php
include "../config/controller.php";
$app = new controller;
$acc_name =$app->post_request('acc_name');
$acc_number =$app->post_request('acc_number');
$balance = $app->post_request('balance');
$acc = base64_decode($app->post_request('acc'));
$formattedDate = date('Y-m-d H:i:s');
if (isset($acc_name,$acc_number)) {
     $query = "UPDATE `account_list` SET `account_no` = '3930293942', `account_name`='$acc_name',`balance`='$balance'  WHERE `account_list`.`id` = $acc";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




