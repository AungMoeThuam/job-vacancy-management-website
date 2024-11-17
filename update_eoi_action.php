<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include_once "./start_session.php";
start_session();
include_once './eoi-controller.php';



$_POST["skill1"] = isset($_POST["skills"][0]) ? $_POST["skills"][0] : "0";
$_POST["skill2"] = isset($_POST["skills"][1]) ? $_POST["skills"][1] : "0";
$_POST["skill3"] = isset($_POST["skills"][2]) ? $_POST["skills"][2] : "0";
$_POST["skill4"] = isset($_POST["skills"][3]) ? $_POST["skills"][3] : "0";



$result = $eoi_controller->update_eoi($_POST);

$url = "location: " . $_SESSION["previous_url"];
header($url);