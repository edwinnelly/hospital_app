<?php
include "../config/controller.php";
$app = new controller;
 $fn = $app->post_request('fn');

 $email = $app->post_request('email');
$phone = $app->post_request('phone');
$address = $app->post_request('address');

$formattedDate = date('Y-m-d H:i:s');

if(isset($fn,$phone,$address)){
    $query = "INSERT INTO `drug_supplier` (`id`, `supplier`, `date_cr`, `status`, `host_key`, `phone`, `addr`, `email`) VALUES (NULL, '$fn', '$formattedDate', '0', NULL, '$phone', '$address', '$email')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




