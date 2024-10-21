<?php
include "../config/controller.php";
$app = new controller;
$qty = $app->post_request('qty');
$postid = $app->post_request('postid');
$ids = $app->post_request('ids');
if (isset($postid)) {
    $query = "update drugs_list set qty='$qty'  where id='$postid'";
    $quer1 = "update purchase_order set status='1'  where id='$ids'";
    $get_category = $app->direct_insert($query);
    $clean_cmd = $app->direct_insert($quer1);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





