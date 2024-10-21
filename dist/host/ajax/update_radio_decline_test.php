<?php
include "../config/controller.php";
$app = new controller;
$postid = $app->post_request('id_dels');
$formattedDate = date('Y-m-d H:i:s');
if (isset($postid)) {
     $query = "UPDATE patient_test_radio SET status='1' WHERE passkey='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




