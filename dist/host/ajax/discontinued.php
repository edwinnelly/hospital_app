<?php
include "../config/controller.php";
$app = new controller;
$postid = $app->post_request('id');
if (isset($postid)) {
   $query = "update drug_admin set status ='discontinued' where id ='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}