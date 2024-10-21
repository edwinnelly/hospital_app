<?php
include "../config/controller.php";
$app = new controller;
$staff_id = (int) $app->post_request('id_del');
if (isset ($staff_id)) {
    $query = "delete from account_list  where id='$staff_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    } else {
        // If no rows were affected, indicate failure
        echo "No record found for deletion.";
    }

} else {

}





