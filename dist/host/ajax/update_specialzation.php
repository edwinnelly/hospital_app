<?php
include "../config/controller.php";
$app = new controller;
$dpt_name = $app->post_request('dpt');
$postid = $app->post_request('postid');

if (isset($postid)) {
      $query = "UPDATE specializations SET specializations_name='$dpt_name' WHERE id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




