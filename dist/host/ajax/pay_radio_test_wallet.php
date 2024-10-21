<?php
include "../config/controller.php";
$app = new controller;
$pid_account = ($app->post_request('pid_account'));
$amt = ($app->post_request('amt'));
$wallet = ($app->post_request('wallet'));
$cds = ($app->post_request('cds'));

//fetch the patient wallet balance
$query = "SELECT wallet FROM patient_data  WHERE pid=$pid_account";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data);

// validate the total amount from test table
$sum_test_result = "SELECT SUM(amount) as amount from patient_test_radio where patient_id=$pid_account and status=0";
$result = $app->fetch_query($sum_test_result);
foreach ($result as $amount);
$total_amount = $data['wallet']-$amount['amount'];

if (isset ($pid_account)) {
    if ($data['wallet'] > $amount['amount']) {
        $query = "update patient_test_radio set payment_status='paid',status=1,payment_method='wallet' ,staff_id='$cds' where patient_id='$pid_account' and payment_status='notpaid' and status='0'";
        $update_bal = "update patient_data set wallet='$total_amount' where pid='$pid_account'";
        $get_category = $app->direct_insert($query);
        $new_balance = $app->direct_insert($update_bal);
        if ($get_category == "success") {
            echo "success";
        }
    } else {

    }

}





