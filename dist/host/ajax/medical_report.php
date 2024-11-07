<?php
include "../config/controller.php";
$app = new controller;
$summernoted = $app->post_request('summary');
$postid = $app->post_request('pid');
$did = $app->post_request('did');
if (isset($summernoted)) {
    $query = "INSERT INTO `medical_report` (`id`, `report_info`, `doc_id`, `pid`) VALUES (NULL, '$summernoted', '$did', '$postid')";
   $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}
