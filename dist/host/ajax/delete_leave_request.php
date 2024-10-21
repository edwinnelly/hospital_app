<?php
include "../config/controller.php";
$app = new controller;
 $staff_id = $app->post_request('id_del1');
if (isset($staff_id)) {
    $query = "delete from leave_request  where id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





