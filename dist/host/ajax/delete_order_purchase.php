<?php
include "../config/controller.php";
$app = new controller;
$id = $app->post_request('id_del');
if (isset($id)) {
    $query = "delete from purchase_order where id='$id' limit 1";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success"){
        echo "success";
    }

} else {

}





