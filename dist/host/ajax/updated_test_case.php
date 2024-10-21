<?php
include "../config/controller.php";
$app = new controller;
$fid =(string) $app->post_request('fid');
$test_name =(string) $app->post_request('test_name');
$test_price =$app->post_request('test_price');
$tat =$app->post_request('tat');
$dpt = $app->post_request('dpt');
$sample = $app->post_request('sample');
$container = $app->post_request('container');
$restrictions = $app->post_request('restrictions');
$formattedDate = date('Y-m-d H:i:s');
if (isset($test_name,$test_price,$fid)) {
     $query = "UPDATE `lab_test_case` SET `test_name` = '$test_name',`test_price`='$test_price',`tat`='$tat',`dpt`='$dpt' WHERE `lab_test_case`.`id` =$fid";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}



