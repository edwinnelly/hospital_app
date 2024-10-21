<?php
include "../config/controller.php";
$app = new controller;
$test_name =(string) $app->post_request('test_name');
$test_price =$app->post_request('test_price');
$tat =$app->post_request('tat');
$dpt = $app->post_request('dpt');
$sample = $app->post_request('sample');
$container = $app->post_request('container');
$restrictions = $app->post_request('restrictions');
$unit = $app->post_request('unit');
$range = $app->post_request('range');
$formattedDate = date('Y-m-d H:i:s');
if (isset($test_name,$test_price)) {
     $query = "INSERT INTO `lab_test_case` (`id`, `test_name`, `test_price`, `tat`, `dpt`, `sample`, `container`, `restrictions`, `created_date`, `status`, `unit`, `ranges_test`) VALUES (NULL, '$test_name', '$test_price', '$tat', '$dpt', '$sample', '$container', '$restrictions', '$formattedDate', '1','$unit','$range')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}



