<?php
include "../config/controller.php";
$app = new controller;
$pid_account = $app->post_request('pid_account');
if (isset($pid_account)) {
    $query = "update patient_test_radio set payment_status='account' where patient_id='$pid_account' and payment_status='notpaid' and status='0'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





