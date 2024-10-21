<?php
include "../config/controller.php";
$app = new controller;
 $test_id = $app->post_request('test_id');
if (isset($test_id)) {
    $query = "delete from patient_test_radio  where id='$test_id'  and status=0";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





