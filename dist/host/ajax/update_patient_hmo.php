<?php
include "../config/controller.php";
$app = new controller;

$hmo_id = $app->post_request('hmo_id');
$pid_id = $app->post_request('pid');
//validate before insert
if ($hmo_id == "" || $pid_id == "") {
    echo "error";
} else {
    
    if (isset($pid_id)) {
        $hmo_id = $app->post_request('hmo_id');
        $query = "UPDATE patient_data SET hmo_plans='$hmo_id' WHERE pid=$pid_id";
        $get_category = $app->direct_insert($query);
        if ($get_category == "success") {
            echo "success";
        }
    }
}