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
$formattedDate = date('Y-m-d H:i:s');
if (isset($asset_name,$asset_type)) {
     $query = "INSERT INTO `asset` (`asset_id`, `asset_name`, `asset_type`, `purchase_date`, `purchase_price`, `current_value`, `location`, `condition_asset`, `owner`, `notes`) VALUES (NULL, '$asset_name', '$asset_type', '$asset_date', '$asset_price', '$current_value', '$asset_location', '$condition', '$owner', '$notes')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




