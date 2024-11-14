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
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($create_manager_table);
// Execute the query
if ($conn->query($createTableSQL) === TRUE) {
    echo "Table 'eoi' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}