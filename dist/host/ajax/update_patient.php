<?php
include "../config/controller.php";
$app = new controller;
$fn = $app->post_request('fn');
$age = $app->post_request('age');
$account_type = $app->post_request('account_type');
$hmo_id = $app->post_request('hmo_id');
$retainer = $app->post_request('retainer');
$gender = $app->post_request('gender');
$phone = $app->post_request('phone');
$email = $app->post_request('email');
$address = $app->post_request('address');
$marital_status = $app->post_request('marital_status');
$nextofkin = $app->post_request('nextofkin');
$tribe = $app->post_request('tribe');
$occupation = $app->post_request('occupation');
$religion = $app->post_request('religion');
$pid_id = $app->post_request('pid');
// $pid_id = rand(1234, 12345);
$formattedDate = date('Y-m-d H:i:s');
if (isset ($fn, $age, $phone)) {
    $hmo_id = $app->post_request('hmo_id');
    $phone = $app->post_request('phone');
    $query = "UPDATE patient_data SET patient_name='$fn',age=$age,account_type='$account_type',hmo_id='$hmo_id',retainer='$retainer',sex='$gender',phone_no='$phone',emails_patient='$email',address='$address',marital_status='$marital_status',next_kin='$nextofkin',tribe='$tribe',occupation='$occupation', religion='$religion' WHERE pid=$pid_id";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




