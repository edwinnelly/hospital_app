<?php
include "../config/controller.php";
$app = new controller;
$plan = $app->post_request('plan');
(int) $labs = $_POST['lab'];
(int) $imaging = $_POST['imaging'];
//var_dump($imaging);
$complaints = $app->post_request('complaints');
$examination = $app->post_request('examination');

foreach ($labs as $lab) {
    // Sanitize facility name
    // $facility_name = htmlspecialchars($facility_name, ENT_QUOTES, 'UTF-8');

    // Check if the facility already exists for the hotel
    $checkSql = "SELECT * FROM lab_test_case WHERE id =$lab";
    $data = $app->fetch_query($checkSql);
    var_dump($data);
    $query = "update patient_test set payment_status='paid',status=1,payment_method='accounts',staff_id='$cds' where patient_id='$pid_account' and payment_status='account' and status='0'";
    $get_category = $app->direct_insert($query);

}


// if (isset($pid_account)) {
//     $query = "update patient_test set payment_status='paid',status=1,payment_method='accounts',staff_id='$cds' where patient_id='$pid_account' and payment_status='account' and status='0'";
//     $get_category = $app->direct_insert($query);
//     if ($get_category == "success") {
//         echo "success";
//     }

// } else {

// }





