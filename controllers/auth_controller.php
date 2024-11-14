<?php

class Auth_controller
{
    function __construct()
    {

    }

    function login_success($manager_id)
    {
        $_SESSION["auth"] = $manager_id;
        $_SESSION["failed_attempts"] = 0;
        header("location: ../manage.php");
    }

    function login_failed()
    {


        // Initialize failed attempts if not set
        if (!isset($_SESSION["failed_attempts"])) {
            $_SESSION["failed_attempts"] = 0;
        }

        // Increment failed attempts
        $_SESSION["failed_attempts"] += 1;

        // Check if failed attempts have exceeded 3 (i.e., 4th failed attempt)
        if ($_SESSION["failed_attempts"] > 3) {
            // If no previous last_failed_attempt_time, set it
            if (!isset($_SESSION["last_failed_attempt_time"])) {
                $_SESSION["last_failed_attempt_time"] = time(); // Record the current time
            }

            // Check if 3 minutes have passed since the last failed attempt
            $time_since_last_attempt = time() - $_SESSION["last_failed_attempt_time"];
            if ($time_since_last_attempt < 180) {  // 180 seconds = 3 minutes
                // Redirect back to login page with a message to wait
                $_SESSION['login_error_message'] = "You have to wait 3 minutes before trying again.";
                header("location: ../login.php");
                exit(); // Stop further execution
            } else {
                // If 3 minutes have passed, reset the failed attempts
                $_SESSION["failed_attempts"] = 1; // Reset to 1 since this is a new failed attempt
                unset($_SESSION["last_failed_attempt_time"]); // Clear the time
            }
        }

        // Redirect to login page after any failed attempt
        header("location: ../login.php");
        exit();
    }


    function logout()
    {
        $_SESSION["failed_attempts"] = 0;
        $_SESSION["auth"] = null;
        unset($_SESSION["auth"]);
        unset($_SESSION["failed_attempts"]);

    }

    function check_auth()
    {
        if (!$_SESSION["auth"] && $_SERVER['REQUEST_URI'] !== "/login.php")
            header("location: /");
        else if ($_SESSION["auth"] && $_SERVER['REQUEST_URI'] === "/login.php") {
            header("location: ../manage.php");
        }
    }





}

$auth_controller = new Auth_controller();