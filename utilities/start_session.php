<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] === "/utilities/start_session.php") {
    header("location: ../index.php");
    exit();
}
function start_session()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $_SESSION["errors"] = isset($_SESSION["errors"]) ? $_SESSION["errors"] : null;
        $_SESSION["auth"] = isset($_SESSION["auth"]) ? $_SESSION["auth"] : null;
        $_SESSION["failed_attempts"] = isset($_SESSION["failed_attempts"]) ? $_SESSION["failed_attempts"] : 0;

    }
}