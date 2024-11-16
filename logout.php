<?php
include_once "./start_session.php";
start_session();
include_once "./auth_controller.php";
$auth_controller->logout();