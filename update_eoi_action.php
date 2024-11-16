<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include_once './eoi-controller.php';

$EOInumber = $_POST['EOInumber'];
$job_reference_no = $_POST['job_reference_no'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$town = $_POST['town'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$status = $_POST['status'];
$other_skills = $_POST['other_skills'];
$new_eoi = $_POST;
$new_eoi["skill1"] = isset($_POST["skills"][0]) ? $_POST["skills"][0] : "0";
$new_eoi["skill2"] = isset($_POST["skills"][1]) ? $_POST["skills"][1] : "0";
$new_eoi["skill3"] = isset($_POST["skills"][2]) ? $_POST["skills"][2] : "0";
$new_eoi["skill4"] = isset($_POST["skills"][3]) ? $_POST["skills"][3] : "0";

unset($new_eoi["skills"]);

$result = $eoi_controller->update_eoi($new_eoi);
if ($result) {
    $url = "location: ../manage-detail.php?EOInumber=" . $EOInumber;
    header($url);
} else {
    echo "error";
}