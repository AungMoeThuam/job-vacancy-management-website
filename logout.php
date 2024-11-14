<?php
include "./utilities/start_session.php";
start_session();
include_once "./controllers/auth_controller.php";
$auth_controller->logout();
header("location: ./index.php");