<?php
include "../config/controller.php";
$app = new controller;
$smkey_val = $app->post_request('smkey_val');
 $result = $app->post_request('result');
 $commemt = $app->post_request('commemt');

if (isset($smkey_val)) {
    $query = "update patient_test set result='$result',comments='$commemt',status=3 where passkey='$smkey_val'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





