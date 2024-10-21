<?php
include "../config/controller.php";
$app = new controller;
$qualification = $app->post_request('qualification');
$occupation = $app->post_request('occupation');
$next_of_kin = $app->post_request('next_of_kin');
$tribe = $app->post_request('tribe');
$salary = $app->post_request('salary');
$state_of_origin = $app->post_request('state_of_origin');
$nationality = $app->post_request('nationality');
$religion = $app->post_request('religion');

$staff_id = $app->post_request('staff_ids1');
$query = "update staffs_accounts set qualification='$qualification',occupation='$occupation',next_of_kin='$next_of_kin',tribe='$tribe',salary='$salary',state_of_origin='$state_of_origin',nationality='$nationality',religion='$religion' where staff_id='$staff_id'";

$get_category = $app->direct_insert($query);
if ($get_category == "success") {
    echo "success";
}