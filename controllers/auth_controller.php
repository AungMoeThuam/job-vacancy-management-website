<?php

class Auth_controller
{
    function __construct()
    {

    }

    function login_success($manager_id)
    {
        if (!$this->is_the_pending_attempt_time_passed()) {
            header("location: ../login.php");
            exit();

        } else {

            $_SESSION["auth"] = $manager_id;
            $_SESSION["failed_attempts"] = 0;
            $_SESSION['login_error_message'] = "";
            unset($_SESSION["last_failed_attempt_time"]);
            header("location: ../manage.php");
            exit();
        }
    }


    function login_failed()
    {


        if (!isset($_SESSION["failed_attempts"])) {
            $_SESSION["failed_attempts"] = 0;
        }


        $_SESSION["failed_attempts"] += 1;

        if ($_SESSION["failed_attempts"] > 3) {
            if (!isset($_SESSION["last_failed_attempt_time"])) {
                $_SESSION["last_failed_attempt_time"] = time();
            }

            if (!$this->is_the_pending_attempt_time_passed()) {
                $_SESSION['login_error_message'] = "You have to wait 3 minutes before trying again.";
                header("location: ../login.php");
                exit();
            } else {
                $_SESSION["failed_attempts"] = 1;
                unset($_SESSION["last_failed_attempt_time"]);
                $_SESSION['login_error_message'] = "";
            }


        }

        header("location: ../login.php");
        exit();
    }

    function is_the_pending_attempt_time_passed()
    {
        $remaining_minute = time() - $_SESSION["last_failed_attempt_time"];
        if ($remaining_minute < 180) {
            return false;
        } else {
            return true;
        }
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
        if ($this->is_the_pending_attempt_time_passed()) {
            $_SESSION["login_error_message"] = "";
        }
        if (!$_SESSION["auth"] && $_SERVER['REQUEST_URI'] !== "/login.php")
            header("location: /");
        else if ($_SESSION["auth"] && $_SERVER['REQUEST_URI'] === "/login.php") {
            header("location: ../manage.php");
        }
    }





}

$auth_controller = new Auth_controller();