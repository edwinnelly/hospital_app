<?php
include "../config/controller.php";
$app = new controller;
$kit_id = $app->post_request('id_del');
if (isset($kit_id)) {
    $query = "delete from lab_kit where id='$kit_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} 





