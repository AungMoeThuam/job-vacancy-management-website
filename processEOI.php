<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}

include 'settings.php';

// Validate and sanitize inputs
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skills_list = $_POST["Skill-List"];
    $job_reference = sanitize_input($_POST['Job_Reference_Number']);
    $first_name = sanitize_input($_POST['First_Name']);
    $last_name = sanitize_input($_POST['Last_Name']);
    $date_of_birth = sanitize_input($_POST["Date_Of_Birth"]);  // Added date of birth
    $gender = sanitize_input($_POST["Gender"]);                // Added gender
    $town = sanitize_input($_POST['Town']);
    $state = sanitize_input($_POST['State']);
    $postcode = sanitize_input($_POST['Postcode']);
    $street = sanitize_input($_POST["Street"]);
    $email = sanitize_input($_POST['Email']);
    $phone = sanitize_input($_POST['Phone']);
    $skill1 = sanitize_input($skills_list[0] ?? "0");
    $skill2 = sanitize_input($skills_list[1] ?? "0");
    $skill3 = sanitize_input($skills_list[2] ?? "0");
    $skill4 = sanitize_input($skills_list[3] ?? "0");
    $other_skills = sanitize_input($_POST['Other_Skills']);

    // Validate input data
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_reference)) {
        die("Invalid job reference number.");
    }
    if (!preg_match("/^[a-zA-Z ]{1,20}$/", $first_name) || !preg_match("/^[a-zA-Z ]{1,20}$/", $last_name)) {
        die("Invalid name format.");
    }
    if (!preg_match("/^[0-9]{4}$/", $postcode)) {
        die("Invalid postcode format.");
    }

    // Insert the validated data into the database with underscores in column names
    $insertSQL = $conn->prepare(
        "INSERT INTO eoi 
        (job_reference_no, first_name, last_name, date_of_birth, gender, street, town, state, postcode, email, phone, skill1, skill2, skill3, skill4, other_skills) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $insertSQL->bind_param(
        "ssssssssssssssss",
        $job_reference,
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