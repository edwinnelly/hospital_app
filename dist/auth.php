<?php
session_start();
include "host/config/controller.php";
$app = new controller;
$email = (string) $app->post_request('email');
$password = (string) $app->post_request('password');



if (isset($email, $password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "select email_address,password from staffs_accounts where email_address='$email' AND password='$password'";
        $result = $app->fetch_query($query);
        $validate_login = (int) count($result);
        if ($validate_login == 1) {
            session_regenerate_id();

            $emails = $_SESSION['email'] = $email; // Initializing Session
            $emails = $_SESSION['login_user'] = $email; // Initializing Session

            //update user login key
            $secures_db = $_SESSION['e_secure'] = bin2hex(random_bytes(32));
            $key_lock = "update staffs_accounts set login_sec='$secures_db' where email_address='$email'";
            $lock = $app->run_query($key_lock);

            echo "success";
        } else {
            return 'invalid';
        }
    }
}
