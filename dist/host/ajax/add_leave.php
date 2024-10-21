<?php
include "../config/controller.php";
$app = new controller;
$emp_id = $app->post_request('dpt_head');
$leave_type = $app->post_request('leave_type');
$from_date = $app->post_request('from_date');
$to_date = $app->post_request('to_date');
$reason = $app->post_request('reason');
$formattedDate = date('Y-m-d H:i:s');
if (isset($emp_id)) {
    $query = "INSERT INTO `leave_request` (`id`, `emp_id`, `leave_type`, `date1`, `date2`, `reasons`, `status`, `date_created`) VALUES (NULL, '$emp_id', '$leave_type', '$from_date', '$to_date', '$reason', 1, '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




