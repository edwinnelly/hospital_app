<?php
include "../config/controller.php";
include "file_upload.php";
$app = new controller;
$pid = $app->post_request('smkey');
$result = $app->post_request('result');
$file1 = "file1";
$file2 = "file2";
$file3 = "file3";
$file4 = "file4";
@$img_path1 = upload_img($file1, $file_size_allowed, $min_size_compress, $radio_pic);
@$img_path2 = upload_img($file2, $file_size_allowed, $min_size_compress, $radio_pic);
@$img_path3 = upload_img($file3, $file_size_allowed, $min_size_compress, $radio_pic);
@$img_path4 = upload_img($file4, $file_size_allowed, $min_size_compress, $radio_pic);
$query = "update patient_test_radio set photo1='$img_path1',photo2='$img_path2',photo3='$img_path3',photo4='$img_path4',comments='$result',status=2 where passkey='$pid'";
$get_category = $app->direct_insert($query);
if ($get_category == "success"){
    echo "success";
}




