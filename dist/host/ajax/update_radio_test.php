<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;

$sample = $app->post_request('sample');
$amount = $app->post_request('amount');
$description = $app->post_request('description');
$account_type = $app->post_request('account_type');
$postid = $app->post_request('postid');

// Validation
$errors = [];

if (empty($sample)) {
    $errors[] = 'Sample is required.';
}

if (empty($postid)) {
    $errors[] = 'Postid is required.';
}
if (empty($amount) || !is_numeric($amount)) {
    $errors[] = 'Valid amount is required.';
}
if (empty($account_type)) {
    $errors[] = 'Department type is required.';
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
    exit;
}

if (isset($postid)) {
    $query = "update radio_graphy_test set sample='$sample',radio_dpt='$account_type', amount='$amount' where id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





