<?php
include "../config/controller.php";
$app = new controller;
$fn = $app->post_request('fn');
$id = $app->post_request('dle');
$email = $app->post_request('email');
$phone = $app->post_request('phone');
$address = $app->post_request('address');

if (isset($fn, $phone, $address)) {
    $query = "update drug_supplier set supplier='$fn',  phone='$phone', addr='$address', email='$email' where id='$id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




