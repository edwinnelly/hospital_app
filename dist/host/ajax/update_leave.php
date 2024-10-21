<?php
include "../config/controller.php";
$app = new controller;
$staff_id = $app->post_request('id_del');
$formattedDate = date('Y-m-d H:i:s');
if (isset($staff_id)) {
    $query = "update leave_request set status=0, approved_date='$formattedDate' where id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





