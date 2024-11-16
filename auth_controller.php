<?php
include_once "./error_controller.php";
include_once "./manager_controller.php";
class Auth_Controller
{
    private Manager_Controller $manager_controller;
    private Error_controller $error_controller;

    function __construct($error_controller, $manager_controller)
    {
        $this->error_controller = $error_controller;
        $this->manager_controller = $manager_controller;

    }

    function login($manager)
    {
        $this->error_controller->clear_all_errors();
        if (!$this->is_the_pending_attempt_time_passed()) {
            $this->login_failed();
            return;
        }
        $result = $this->manager_controller->find_manager($manager);
        if (!$result) {
            $this->login_failed();
        } else {
            $this->login_success($result);
        }
    }

    function register($new_manager)
    {
        $this->error_controller->clear_all_errors();

        $password = $new_manager["password"];
        $confirm_password = $new_manager["confirm_password"];
        if ($password !== $confirm_password) {
            $this->error_controller->set_error("register_password", "passwords are not matched!");
            header("location: ./register.php");
            return exit();

        }

        $result = $this->manager_controller->find_manager_by_username($new_manager);
        if ($result) {
            $this->error_controller->set_error("register_username", "username already taken!");
            header("location: ./register.php");
            return exit();
        } else {
            $result = $this->manager_controller->create_manager($new_manager);
            $this->login_success($result);

        }
    }

    function login_success($manager_username)
    {
        if (!$this->is_the_pending_attempt_time_passed()) {
            header("location: ./login.php");
            exit();

        } else {

            $_SESSION["auth"] = $manager_username;
            $_SESSION["failed_attempts"] = 0;
            unset($_SESSION["last_failed_attempt_time"]);
            header("location: ./manage.php");
            exit();
        }
    }


    function login_failed()
    {


        if (!isset($_SESSION["failed_attempts"])) {
            $_SESSION["failed_attempts"] = 0;
        }


        $_SESSION["failed_attempts"] += 1;
        $this->error_controller->set_error("login_error_message", "Invalid Username and Password!");

        if ($_SESSION["failed_attempts"] > 3) {
            if (!isset($_SESSION["last_failed_attempt_time"])) {
                $_SESSION["last_failed_attempt_time"] = time();
            }

            if (!$this->is_the_pending_attempt_time_passed()) {
                $this->error_controller->set_error("login_error_message", "You have to wait 3 minutes before trying again.");

            } else {
                $_SESSION["failed_attempts"] = 1;
                unset($_SESSION["last_failed_attempt_time"]);
            }


        }

        header("location: ./login.php");
        exit();
    }

    function is_the_pending_attempt_time_passed()
    {
        if (isset($_SESSION["last_failed_attempt_time"])) {
            $remaining_minute = time() - $_SESSION["last_failed_attempt_time"];
            if ($remaining_minute < 180) {
                return false;
            } else {
                return true;
            }
        }

        return true;

    }


    function logout()
    {
        $_SESSION["failed_attempts"] = 0;
        $_SESSION["auth"] = null;
        unset($_SESSION["auth"]);
        unset($_SESSION["failed_attempts"]);
        $this->error_controller->clear_all_errors();


    }

    function check_auth()
    {


        if ($this->is_the_pending_attempt_time_passed() && isset($_SESSION["last_failed_attempt_time"])) {
            $this->error_controller->unset_error("login_error_message");
        }
        $login_url = str_contains($_SERVER['REQUEST_URI'], "/login.php");
        $regiser_url = str_contains($_SERVER['REQUEST_URI'], "/register.php");
        if (!$_SESSION["auth"] && !$login_url && !$regiser_url) {
            header("location: ./index.php");

        } else if ($_SESSION["auth"] && ($login_url || $regiser_url)) {
            header("location: ./manage.php");
        }
    }


}

$auth_controller = new Auth_Controller($error_controller, $manager_controller);