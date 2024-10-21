<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
if (isset($dpt_name)) {
     $query = "INSERT INTO `radio_departments` (`DepartmentID`, `DepartmentName`, `CreatedAt`) VALUES (NULL, '$dpt_name', current_timestamp())";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




