<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;

// Get the input values
$postid = $app->post_request('postid');
$op = $app->post_request('op');

// Validate inputs
$errors = [];

if (empty($postid)) {
    $errors[] = "ID is required.";
} elseif (!is_numeric($postid)) {
    $errors[] = "ID must be a number.";
}

// If there are no errors, proceed with the database insert
if (empty($errors)) {
    $query = "update appointment set status='$op' where id='$postid'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    } else {
        echo "Database update failed.";
    }
} else {
    // Display errors
    foreach ($errors as $error) {
        echo "$error";
    }
}

