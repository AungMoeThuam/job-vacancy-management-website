<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "jobs";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, create if not
$create_eoi_table = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        job_reference_no VARCHAR(5) NOT NULL,
        first_name VARCHAR(20) NOT NULL,
        last_name VARCHAR(20) NOT NULL,
        street VARCHAR(40) NOT NULL,
        town VARCHAR(40) NOT NULL,
        state VARCHAR(3) NOT NULL,
        postcode VARCHAR(4) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        skill1 VARCHAR(100) DEFAULT 0,
        skill2 VARCHAR(100) DEFAULT 0,
        skill3 VARCHAR(100) DEFAULT 0,
        skill4 VARCHAR(100) DEFAULT 0,
        other_skills TEXT,
        status ENUM('New', 'Current', 'Final') DEFAULT 'New' NOT NULL,
        gender ENUM('Male', 'Female') NOT NULL,
        date_of_birth DATE NOT NULL
    )";

$create_manager_table = "CREATE TABLE IF NOT EXISTS managers (
    username VARCHAR(255) PRIMARY KEY NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$create_job_description_table = "CREATE TABLE IF NOT EXISTS job_descriptions (
    job_reference_no CHAR(5) PRIMARY KEY NOT NULL, 
    title VARCHAR(255) NOT NULL, 
    salary_range VARCHAR(50) NOT NULL, 
    working_hour VARCHAR(50) NOT NULL, 
    working_from ENUM('Remote', 'Office','Hybrid') NOT NULL, 
    reports_to VARCHAR(255) NOT NULL, 
    description TEXT NOT NULL, 
    responsibilities TEXT NOT NULL, 
    essential_qualifications TEXT NOT NULL, 
    preferable_qualifications TEXT NOT NULL, 
    reference VARCHAR(255) 
)";
$conn->query($create_manager_table);
$conn->query($create_job_description_table);
// Execute the query
$conn->query($create_eoi_table);