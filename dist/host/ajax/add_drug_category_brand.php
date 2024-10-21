<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$formattedDate = date('Y-m-d H:i:s');
if (isset($dpt_name)) {
    $query = "INSERT INTO `drug_brand_category` (`id`, `category_name`, `status`, `created_date`) VALUES (NULL, '$dpt_name', '0', NULL)";
   $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




