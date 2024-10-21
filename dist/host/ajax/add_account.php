<?php
include "../config/controller.php";
$app = new controller;
$acc_name =$app->post_request('acc_name');
$acc_number =$app->post_request('acc_number');
$balance = $app->post_request('balance');
$formattedDate = date('Y-m-d H:i:s');
if(isset($acc_name,$acc_number)) {
     $query = "INSERT INTO `account_list` (`id`, `account_no`, `account_name`, `cr`, `dr`, `balance`, `created_date`) VALUES (NULL, '$acc_number', '$acc_name', '0', '0', '$balance', '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




