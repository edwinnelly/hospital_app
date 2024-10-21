<?php
include "../config/controller.php";
$app = new controller;
$pid = $app->post_request('pid');
$qty = $app->post_request('qty');
$price = $app->post_request('price');
$order_date = $app->post_request('order_date');
$description = $app->post_request('description');
$batch = $app->post_request('batch');
$formattedDate = date('Y-m-d H:i:s');

if (isset($pid)) {
     $query = "INSERT INTO `purchase_order` (`id`, `pid`, `amount`, `payment_status`, `created_on`, `choosen_date`, `status`, `qty`, `batch_id`) VALUES (NULL, '$pid', '$price', 'no', '$formattedDate', '$order_date', '0', '$qty', '$batch')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




