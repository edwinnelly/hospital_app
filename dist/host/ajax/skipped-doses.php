<?php
include "../config/controller.php";
$app = new controller;
echo  $postid = $app->post_request('ids');
if (isset($postid)) {
    $query = "UPDATE `drug_charting` SET status ='skipped' WHERE id ='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}