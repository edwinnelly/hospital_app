<?php
include "../config/controller.php";
$app = new controller;
$asset_name =(string) $app->post_request('asset_name');
$asset_type =$app->post_request('asset_type');
$asset_price =$app->post_request('asset_price');
$asset_location = $app->post_request('asset_location');
$owner = $app->post_request('owner');
$notes = $app->post_request('notes');
$condition = $app->post_request('condition');
$asset_date = $app->post_request('asset_date');
$current_value = $app->post_request('current_value');
$pid = $app->post_request('pid');
$formattedDate = date('Y-m-d H:i:s');
if (isset($asset_name,$asset_type)) {
    $query = "UPDATE asset SET asset_name ='$asset_name', asset_type='$asset_type',purchase_price='$asset_price',owner='$owner',location='$asset_location',notes='$notes',purchase_date='$asset_date' WHERE asset_id=$pid";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




