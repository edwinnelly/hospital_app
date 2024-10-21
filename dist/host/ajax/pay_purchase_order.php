<?php
include "../config/controller.php";
$app = new controller;
$id =123;
if (isset($id)) {
    $query = "update purchase_order set send_to_account='paid',payment_status='yes' where send_to_account='yes'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success"){
        echo "success";
    }

} else {

}





