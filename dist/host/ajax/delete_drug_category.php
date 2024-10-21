<?php
include "../config/controller.php";
$app = new controller;
$staff_id = $app->post_request('id_del');
if (isset($staff_id)) {
    $query = "delete from drug_category  where id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





