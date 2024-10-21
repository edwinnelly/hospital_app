<?php
include "../config/controller.php";
$app = new controller;
$facilities = $_POST['facilities'] ?? [];
$formattedDate = date('Y-m-d H:i:s');

//check if the $facilities is int
if (!is_array($facilities)) {
    echo "Invalid input. bill should be an ...";
    exit;
}
//check if the $facilities is empty
if (empty($facilities)) {
    echo "No bill selected.";
    exit;
}
 
//validate int 
foreach ($facilities as $facility) {    
    if (!ctype_digit($facility)) {
        echo "Invalid input. bill should be integers.";
        exit;
    }
}
//update the db using for each 
foreach ($facilities as $facility) {
    $app->direct_insert("update hmo_payment_requests set status='pending' where request_id='$facility'");
}
echo "Success";





