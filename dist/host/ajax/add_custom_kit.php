<?php
include "../config/controller.php";
$app = new controller;
$kit_name = $app->post_request('kit_name');
$catgory = $app->post_request('catgory');
$formattedDate = date('Y-m-d H:i:s');
if (isset($kit_name)) {
    $query = "INSERT INTO `lab_kit` (`id`, `kit_name`, `kit_type`, `status`) VALUES (NULL, '$kit_name', '$catgory', 'active')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




