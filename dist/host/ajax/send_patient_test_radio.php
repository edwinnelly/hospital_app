<?php
include "../config/controller.php";
$app = new controller;
$test_id = $app->post_request('id');
$pid = $app->post_request('pid');
$spid = $app->post_request('spid');
$amount = $app->post_request('amount');
$dpt = $app->post_request('dpt');
//generate a key for the test id
$test_key = rand(1234567, 12345678);
//set the data to be inserted into the database
$formattedDate = date('Y-m-d H:i:s');
if (isset ($test_id)) {
    $query = "INSERT INTO `patient_test_radio` (`id`, `test_id`, `result`, `approved_by`, `passkey`, `dated_created`, `status`, `patient_id`, `taken_by`, `payment_status`, `hmo`,`amount`,`dpt`) VALUES (NULL, '$test_id', NULL, NULL, '$test_key', '$formattedDate', '0', '$pid', '$spid', 'notpaid', 0,'$amount','$dpt')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




