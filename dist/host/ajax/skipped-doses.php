<?php
include "../config/controller.php";
$app = new controller;
$postid = $app->post_request('id_dels');
if (isset($postid)) {
   $query = "update drug_charting set status ='skipped' where id ='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}