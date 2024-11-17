<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include_once "./start_session.php";
start_session();
include_once './eoi-controller.php';




$result = $eoi_controller->update_eoi($_POST);

$url = "location: " . $_SESSION["previous_url"];
header($url);