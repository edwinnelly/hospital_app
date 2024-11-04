<?php
include "../config/controller.php";
$app = new controller;
$fluid_name = $app->post_request('id_del');
$patient_id = $app->post_request('pid');
$doctor_id = $app->post_request('doctor');
$input = $app->post_request('fluid_input');
$output = $app->post_request('fluid_output');
$start_date = $app->post_request('start_date');
$end_date = $app->post_request('end_date');
if (isset($fluid_name)) {
    $query = "INSERT INTO `fluid_chart` (`id`, `fluid_name`, `patient_id`, `doctor_id`, `fluid_input`, `fluid_output`, `start_date`,`end_date`, `status`) VALUES (NULL, '$fluid_name', '$patient_id', '$doctor_id', '$input','$output', '$start_date', '$end_date', 'charted')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

}