<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && strpos($_SERVER['REQUEST_URI'], "/start_session.php")) {
    header("location: ./index.php");
    exit();
}
function start_session()
{   //if session havent started yet
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        $_SESSION["errors"] = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
        $_SESSION["auth"] = isset($_SESSION["auth"]) ? $_SESSION["auth"] : null;
        $_SESSION["failed_attempts"] = isset($_SESSION["failed_attempts"]) ? $_SESSION["failed_attempts"] : 0;

    }
}