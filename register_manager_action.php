<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include_once "./start_session.php";
start_session();
include_once "./auth_controller.php";

$new_manager = $_POST;
$auth_controller->register($new_manager);