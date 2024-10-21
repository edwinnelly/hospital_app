<?php
include "../config/controller.php";
$app = new controller;
$acc_name = $app->post_request('acc_name');
$postid = $app->post_request('postid');
if (isset($postid)) {
     $query = "UPDATE expense_category SET category='$acc_name' WHERE id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




