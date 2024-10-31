<?php
include "../config/controller.php";
$app = new controller;
$pid = $app->post_request('pid');
$doctor = $app->post_request('doctor');
$drug_name = $app->post_request('drugs');
$dose = $app->post_request('dose');
$frequency = $app->post_request('frequency');
$start_date = $app->post_request('start_date');
$end_date = $app->post_request('end_date');
// $formattedDate = date('Y-m-d H:i:s');
if (isset($drug_name)) {
    $query = "INSERT INTO `drug_admin` (`id`, `patient_id`, `doctor_id`, `drug_id`, `dose`, `frequency`,`start_date`, `end_date`, `status`) VALUES (NULL, '$pid', '$doctor', '$drug_name','$dose','$frequency','$start_date','$end_date', 'no')";
   $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}
