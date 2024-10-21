<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$abbr = $app->post_request('abbr');
if (isset($dpt_name)) {
     $query = "INSERT INTO `wards` (`id`, `ward_name`, `amount`, `no_bed`, `dated_created`) VALUES (NULL, '$dpt_name', '$abbr', NULL, NULL)";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




