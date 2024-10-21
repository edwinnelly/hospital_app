<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;

// Get the input values
$summernoted = $app->post_request('summernoted');
$id = $app->post_request('postid');

// Validate inputs
$errors = [];

if (empty($summernoted)) {
    $errors[] = "Title is required.";
} elseif (strlen($summernoted) < 10) {
    $errors[] = "Title must be at least 10 characters long.";
}

if (empty($id)) {
    $errors[] = "ID is required.";
} elseif (!is_numeric($id)) {
    $errors[] = "ID must be a number.";
}


$formattedDate = date('Y-m-d H:i:s');

// If there are no errors, proceed with the database insert
if (empty($errors)) {
    $query = "INSERT INTO `referrals` (`id`, `report_info`, `doc_id`, `pid`, `created_date`) VALUES (NULL, '$summernoted', '$staff_ids', '$id', '$formattedDate')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    } else {
        echo "Database insert failed.";
    }
} else {
    // Display errors
    foreach ($errors as $error) {
        echo "$error";
    }
}

