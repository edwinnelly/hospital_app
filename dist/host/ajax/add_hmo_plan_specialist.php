<?php
include "../config/controller.php";
$app = new controller;
$plan_id = $app->post_request('plan_id');
$hmopass = $app->post_request('hmopass');
$test_id_n = $app->post_request('test_id_n');

if (isset($hmopass)) {
    // Check if the case already exists
    $check_query = "SELECT * FROM hmo_specialist_group WHERE case_id = '$test_id_n' and profile_id='$plan_id' and hmo_id='$hmopass'";
    $case_exists = $app->fetch_query($check_query);

    // Count the number of rows returned
    $count = count($case_exists);

    if ($count > 0) {
        // Case exists, handle accordingly
        echo "Case already exists.";
    } else {
        // Case does not exist, proceed with insert
        $query = "INSERT INTO `hmo_specialist_group` (`id`, `hmo_id`, `profile_id`, `allowance`, `status`, `case_id`, `date_created`) VALUES (NULL, '$hmopass', '$plan_id', NULL, NULL, '$test_id_n', NULL)";
        $get_category = $app->direct_insert($query);
        if ($get_category == "success") {
            echo "success";
        } else {
            echo "Failed to insert record.";
        }
    }
}

