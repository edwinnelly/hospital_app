<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$formattedDate = date('Y-m-d H:i:s');
if (isset($dpt_name)) {
    $query = "INSERT INTO `hmo_profiles` (`id`, `hmo_id`, `profile_name`, `status`, `date_created`) VALUES (NULL, '$hmo_key', '$dpt_name', '1', '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




