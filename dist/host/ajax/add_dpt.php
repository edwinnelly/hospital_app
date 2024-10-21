<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$abbr = $app->post_request('abbr');
$dpt_head = $app->post_request('dpt_head');
$formattedDate = date('Y-m-d H:i:s');
if (isset($dpt_name)) {
    $query = "INSERT INTO `department` (`id`, `department_name`, `date_created`, `status`, `leader`,`abbr`) VALUES (NULL, '$dpt_name', '$formattedDate', '1', '$dpt_head','$abbr')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




