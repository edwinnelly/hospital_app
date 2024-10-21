<?php
include "../config/controller.php";
$app = new controller;
 $postid = $app->post_request('id_del');
if (isset($postid)) {
    $query = "delete from appointment  where id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





