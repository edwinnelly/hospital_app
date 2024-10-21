<?php
include_once ('cores.php');
include_once ('db-config.php');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

class controller extends dbc
{
    /** function to logout a user **/
    public function logout()
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
    }

    // /** function to check if a user is logged in **/
    // public function checkLogin()
    // {
    //     if (isset($_SESSION['login_user'])) {
    //         return 'logged';
    //     } else {
    //         return 'nau';
    //     }
    // }

    public function checkLogin()
{
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if session variable is set and user is logged in
    if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {

        // Optional: Add additional checks like session timeout
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
            // Session expired after 30 minutes (1800 seconds), destroy session
            session_unset();
            session_destroy();
            return 'session_expired';
        }

        // Update last activity time
        $_SESSION['last_activity'] = time();

        return 'logged';
    } else {
        return 'nau';
    }
}


    /** function to reduce the lenght of a string **/
    public function stringFormat($string, $len)
    {
        if (strlen($string) > $len) {
            return substr($string, 0, $len) . '...';
        } else {
            return $string;
        }
    }
    public function fetch_query($query)
    {
        try {
            // Execute the SQL query and get the result set.
            $result = $this->run_query($query);

            // Check if the query execution was successful.
            if ($result) {
                // Initialize an empty array to store the fetched data.
                $data = [];

                // Fetch rows one by one from the result set and add them to the $data array.
                while ($row = $result->fetch_assoc()) {
                    // Sanitize each value in the row before adding it to the $data array.
                    $sanitized_row = [];
                    foreach ($row as $key => $value) {
                        // Use htmlentities to sanitize data for safe output in HTML context.
                        // This prevents XSS (Cross-Site Scripting) attacks when displaying data in HTML.
                        $sanitized_row[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        // You can apply additional sanitization techniques as needed based on your specific requirements.
                    }
                    $data[] = $sanitized_row;
                }

                // Free the memory associated with the result set.
                // This is important to release resources and prevent memory leaks.
                $result->free();

                // Clean up by unsetting the $result variable.
                unset($result);

                // Return the fetched and sanitized data.
                return $data;
            } else {
                // Query execution failed, return an empty array or handle the error accordingly.
                return [];
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during database operations
            // For example, log the error or return an error message.
            // You can customize this according to your application's needs.
            return ['error' => $e->getMessage()];
        } finally {
            // Make sure to close the database connection in case of an error or successful execution.
            if (isset($result)) {
                $result->free();
            }
        }
    }


    public function direct_insert($query)
    {
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function time_ago($timestamp)
    {
        try {
            $current_time = new DateTime();
            $past_time = new DateTime($timestamp);
            $interval = $current_time->diff($past_time);

            if ($interval->y > 0) {
                return $interval->y . " year" . ($interval->y > 1 ? 's' : '') . " ago";
            } elseif ($interval->m > 0) {
                return $interval->m . " month" . ($interval->m > 1 ? 's' : '') . " ago";
            } elseif ($interval->d > 0) {
                return $interval->d . " day" . ($interval->d > 1 ? 's' : '') . " ago";
            } elseif ($interval->h > 0) {
                return $interval->h . " hour" . ($interval->h > 1 ? 's' : '') . " ago";
            } elseif ($interval->i > 0) {
                return $interval->i . " minute" . ($interval->i > 1 ? 's' : '') . " ago";
            } else {
                return "Just now";
            }
        } catch (Exception $e) {
            return "Invalid timestamp";
        }
    }



}

