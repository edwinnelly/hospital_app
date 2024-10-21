<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;

$sample = $app->post_request('sample');
$amount = $app->post_request('amount');
$description = $app->post_request('description');
$account_type = $app->post_request('account_type');

$formattedDate = date('Y-m-d H:i:s');
$testcode = rand(123456,1234567);

// Validation
$errors = [];

if (empty($sample)) {
    $errors[] = 'Sample is required.';
}
if (empty($amount) || !is_numeric($amount)) {
    $errors[] = 'Valid amount is required.';
}
if (empty($account_type)) {
    $errors[] = 'Account type is required.';
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
    exit;
}

if (isset($sample)) {
    $query = "INSERT INTO `radio_graphy_test` (`id`, `radio_dpt`, `sample`, `amount`, `test_dated`, `test_code`) VALUES (NULL, '$account_type', '$sample', '$amount', '$formattedDate', '$testcode')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
} else {

}





