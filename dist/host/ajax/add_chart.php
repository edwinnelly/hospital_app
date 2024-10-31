<?php
include "../config/controller.php";
$app = new controller;
$id = $app->post_request('id_del');
$patient_id = $app->post_request('pid');
$doctor_id = $app->post_request('doctor');
$dose = $app->post_request('dose');
$frequency = $app->post_request('frequency');
$chart_date = $app->post_request('start_date');
$comments = $app->post_request('comments');
if (isset($id)) {
    $query = "INSERT INTO `drug_charting` (`id`, `drug_id`, `patient_id`, `doctor_id`, `doses`, `frequency`, `chart_date`,`comment`, `status`) VALUES (NULL, '$id', '$patient_id', '$doctor_id', '$dose','$frequency', '$chart_date', '$comments', 'charted')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

}