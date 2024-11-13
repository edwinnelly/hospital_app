<?php
include "../config/controller.php";
$app = new controller;
$patient_id = $app->post_request('patient_id');
$doctor_id = $app->post_request('doctor_id');
$diagnosis_suffered = $app->post_request('diagnosis');
$reason_referral = $app->post_request('reason_referral');
$referring_condition = $app->post_request('referral_condition');
$referred_to = $app->post_request('referred_to');
if (isset($patient_id)) {
    $query = "INSERT INTO `referral` (`id`, `patient_id`, `doctor_id`, `diagnosis_suffered`, `reason_referral`, `referring_condition`,`referred_to`) VALUES (NULL, '$patient_id', '$doctor_id', '$diagnosis_suffered','$reason_referral', '$referring_condition', '$referred_to')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

}