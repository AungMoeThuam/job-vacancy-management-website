<?php
include "../utilities/start_session.php";
start_session();
include_once "../controllers/manager_controller.php";
include_once "../controllers/auth_controller.php";

$manager = $_POST;
$result = $manager_controller->find_manager($manager);
if (!$result) {
    $auth_controller->login_failed();
} else {
    $auth_controller->login_success($result);
}
var_dump($_POST);
var_dump($_SESSION);