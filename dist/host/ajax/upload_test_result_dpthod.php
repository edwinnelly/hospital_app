<?php
include "../config/controller.php";
$app = new controller;
$smkey_val = $app->post_request('smkey_val');
 $result = $app->post_request('result');
 $commemt = $app->post_request('commemt');
 $result_approve = $app->post_request('result_approve');
 $host = $app->post_request('host');

if (isset($smkey_val)) {
    $query = "update patient_test set result='$result',comments='$commemt',status='$result_approve',rerun='$result_approve',approved_by='$host' where passkey='$smkey_val'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





