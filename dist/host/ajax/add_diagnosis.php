<?php
include "../config/controller.php";
$app = new controller;
$patient_id = $app->post_request('patient_id');
$doctor_id = $app->post_request('doctor_id');
$diagnosis_suffered = $app->post_request('diagnosis');
$status = $app->post_request('status');
$date_onset = $app->post_request('date_onset');
$date_resolved = $app->post_request('date_resolved');
if (isset($patient_id)) {
    $query = "INSERT INTO `diagnosis` (`id`, `patient_id`, `doctor_id`, `diagnosis_suffered`, `status`, `date_onset`,`date_resolved`) VALUES (NULL, '$patient_id', '$doctor_id', '$diagnosis_suffered','$status', '$date_onset', '$date_resolved')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

}