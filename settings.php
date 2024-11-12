<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "jobs";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, create if not
$createTableSQL = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        job_reference_no VARCHAR(5),
        first_name VARCHAR(20),
        last_name VARCHAR(20),
        street VARCHAR(40),
        town VARCHAR(40),
        state VARCHAR(3),
        postcode VARCHAR(4),
        email VARCHAR(100),
        phone VARCHAR(15),
        skill1 VARCHAR(100),
        skill2 VARCHAR(100),
        skill3 VARCHAR(100),
        skill4 VARCHAR(100),
        other_skills TEXT,
        status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    )";
$conn->query($createTableSQL);