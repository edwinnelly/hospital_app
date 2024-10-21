<?php
include "../config/controller.php";
$app = new controller;
$pid_account = $app->post_request('pid_account');
$cds = $app->post_request('cds');
if (isset($pid_account)) {
    $query = "update patient_test_radio set payment_status='paid',status=1,payment_method='accounts',staff_id='$cds' where patient_id='$pid_account' and payment_status='account' and status='0'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





