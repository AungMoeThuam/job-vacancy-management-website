<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}

include_once "./start_session.php";
start_session();

include_once "./auth_controller.php";

$manager = $_POST;
$auth_controller->login($manager);