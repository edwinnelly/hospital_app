<?php
include "../config/controller.php";
include "file_upload.php";
$app = new controller;

 $staff_id = $app->post_request('staff_ids11');

$file1 = "file";
 
 @$img_path1 = upload_img($file1, $file_size_allowed, $min_size_compress, $ticket_pic);

 $query = "update staffs_accounts set photo='$img_path1' where staff_id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }




