<?php
include "../config/controller.php";
$app = new controller;
$acc_name =$app->post_request('acc_name');
$acc_number =$app->post_request('acc_number');
$formattedDate = date('Y-m-d H:i:s');
if (isset($acc_name,$acc_number)) {
     $query = "INSERT INTO `expense_category` (`id`, `category`, `account_number`, `dated_created`) VALUES (NULL, '$acc_name', '$acc_number', '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




