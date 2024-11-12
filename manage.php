<?php
// Include the settings.php file to connect to the database
include './settings.php';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set default sorting option
$sortBy = "EOInumber"; // Default is sorting by EOInumber

// Check if sorting option is selected via GET
if (isset($_GET['sort_by'])) {
    $sortBy = $_GET['sort_by']; // Can be 'first_name', 'last_name', or 'both'
}

// Define sorting query
if ($sortBy === 'first_name') {
    $orderBy = "ORDER BY first_name";
} elseif ($sortBy === 'last_name') {
    $orderBy = "ORDER BY last_name";
} elseif ($sortBy === 'both') {
    $orderBy = "ORDER BY first_name, last_name";
} else {
    $orderBy = "ORDER BY EOInumber"; // Default sorting
}

// Fetch all EOIs from the database
$sql = "SELECT * FROM eoi $orderBy";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Manage EOIs</title>

</head>

<body>
    <?php include "./header.php" ?>


    <main class="manage-main">
        <!-- Left side menu -->
        <div class="sorting-menu">
            <h3>Sorting Menu</h3>
            <ul>
                <li><a href="manage.php?sort_by=first_name">Sort by First Name</a></li>
                <li><a href="manage.php?sort_by=last_name">Sort by Last Name</a></li>
                <li><a href="manage.php?sort_by=both">Sort by First and Last Name</a></li>
            </ul>
        </div>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>EOI Number</th>
                        <th>Job Reference</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['EOInumber'] . "</td>";
                            echo "<td>" . $row['job_reference_no'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td class='edit-btn'><a href='detail.php?id=" . $row['EOInumber'] . "'>Edit</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No EOIs found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include "./footer.php" ?>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>