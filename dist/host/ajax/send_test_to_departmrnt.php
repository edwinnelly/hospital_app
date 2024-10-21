<?php
include "../config/controller.php";
$app = new controller;
 $passkey = $app->post_request('id_del');
if (isset($passkey)) {
    $query = "update patient_test set status=2 where passkey='$passkey'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





