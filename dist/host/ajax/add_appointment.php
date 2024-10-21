<?php
include "../config/controller.php";
include "../config/checkers.php";
$app = new controller;

// Get the input values
$tittle = $app->post_request('tittle');
$id = $app->post_request('id');
$description = $app->post_request('description');
$timer = $app->post_request('timer');
$specialist = $app->post_request('specialist');
$docid = $app->post_request('docid');

// Validate inputs
$errors = [];

if (empty($tittle)) {
    $errors[] = "Title is required.";
} elseif (strlen($tittle) < 10) {
    $errors[] = "Title must be at least 10 characters long.";
}

if (empty($id)) {
    $errors[] = "ID is required.";
} elseif (!is_numeric($id)) {
    $errors[] = "ID must be a number.";
}

if (empty($description)) {
    $errors[] = "Description is required.";
} elseif (strlen($description) < 10) {
    $errors[] = "Description must be at least 10 characters long.";
}


$formattedDate = date('Y-m-d H:i:s');

// If there are no errors, proceed with the database insert
if (empty($errors)) {
    $query = "INSERT INTO `appointment` (`id`, `pid`, `tittle`, `description`, `appointment_date`, `doc_id`, `dated`,`specialist_id`,`assigned_doc_id`) VALUES (NULL, '$id', '$tittle', '$description', '$timer', '$staff_ids', '$formattedDate','$specialist','$docid')";
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

