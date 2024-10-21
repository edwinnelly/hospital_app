<?php
include "../config/controller.php";
$app = new controller;
$medicine = $app->post_request('medicine');
$qty = $app->post_request('qty');
$drug_category = $app->post_request('drug_category');
$supplier_id = $app->post_request('supplier_id');
$drug_format = $app->post_request('drug_format');
$brand_id = $app->post_request('brand_id');
$prod_date = $app->post_request('prod_date');

$expiration_date = $app->post_request('expiration_date');
$cost_price = $app->post_request('cost_price');
$sell_price = $app->post_request('sell_price');
$aq_reminder = $app->post_request('aq_reminder');
$batchno = $app->post_request('batchno');

$formattedDate = date('Y-m-d H:i:s');

if (isset ($medicine, $drug_category, $supplier_id)) {
    $query = "INSERT INTO drugs_list (id, drugs_name, generic, category_id, drugs_class, suppliers_id, qty, qty_reminder, cost_price, selling_price, brand_id, drugs_types, production_date, expiry_date, batch_no, user_id, status) VALUES
     (NULL, '$medicine', NULL, '$drug_category', NULL, '$supplier_id', '$qty', '$aq_reminder', '$cost_price', '$sell_price', '$brand_id', '$drug_format', '$prod_date', '$expiration_date', '$batchno', NULL, '0')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




