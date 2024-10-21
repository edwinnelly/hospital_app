<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$abbr = $app->post_request('abbr');
if (isset($dpt_name)) {
     $query = "INSERT INTO `hmo` (`id`, `hmo_name`, `abbr`, `status`, `credit`, `debit`, `balance`) VALUES (NULL, '$dpt_name', '$abbr', '1', '0', '0', '0')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




