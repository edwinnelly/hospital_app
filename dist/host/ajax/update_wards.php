<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$abbr = $app->post_request('abbr');
$postid = $app->post_request('postid');
$formattedDate = date('Y-m-d H:i:s');
if (isset($postid)) {
     $query = "UPDATE wards SET ward_name='$dpt_name',amount='$abbr' WHERE id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




