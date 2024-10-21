<?php
include "../config/controller.php";
$app = new controller;
 $test_id = $app->post_request('test_id');
if (isset($test_id)) {
    $query = "delete from hmo_radio_group  where id='$test_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





