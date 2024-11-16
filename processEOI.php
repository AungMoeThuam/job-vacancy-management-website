<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include "./utilities/start_session.php";
start_session();
include "./controllers/error_controller.php";
include "./utilities/validate_input.php";
include './settings.php';


// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    validate_form($_POST);
    exit();



    // $error_controller->set_error("job_reference_no", " Job Reference Number is required and exactly 5 alphanumeric
    //         characters accepted.");



    // Insert the validated data into the database with underscores in column names
    $insertSQL = $conn->prepare(
        "INSERT INTO eoi 
        (job_reference_no, first_name, last_name, date_of_birth, gender, street, town, state, postcode, email, phone, skill1, skill2, skill3, skill4, other_skills) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $insertSQL->bind_param(
        "ssssssssssssssss",
        $job_reference_no,
        $first_name,
        $last_name,
        $date_of_birth,
        $gender,
        $street,
        $town,
        $state,
        $postcode,
        $email,
        $phone,
        $skill1,
        $skill2,
        $skill3,
        $skill4,
        $other_skills
    );

    if ($insertSQL->execute()) {
        echo "EOI submitted successfully. Your EOI number is: " . $conn->insert_id;
    } else {
        echo "Error: " . $conn->error;
    }

    $insertSQL->close();
}

$conn->close();