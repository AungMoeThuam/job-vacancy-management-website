<?php
session_start();

// Include the settings.php file to connect to the database
include './settings.php';


// Set default sorting option
$sortBy = "EOInumber"; // Default is sorting by EOInumber

// Check if sorting option is selected via GET
if (isset($_GET['sort_by'])) {
    $sortBy = $_GET['sort_by']; // Can be 'first_name', 'last_name', or 'both'
}

// Define sorting query
if ($sortBy == "eoi_no") {
    $orderBy = "ORDER BY EOInumber";
} elseif ($sortBy === 'first_name') {
    $orderBy = "ORDER BY first_name";
} elseif ($sortBy === 'last_name') {
    $orderBy = "ORDER BY last_name";
} elseif ($sortBy === 'both') {
    $orderBy = "ORDER BY first_name, last_name";
} else {
    $orderBy = "ORDER BY EOInumber"; // Default sorting
}


$delete_eoi_id = $_POST["delete-eoi-id"];

$search_job_ref_no = $_GET["Job-Reference-No"];
$search_first_name = $_GET["First-Name"];
$search_last_name = $_GET["Last-Name"];

$_SESSION["search"]["Job-Reference-No"] = $search_job_ref_no;
$_SESSION["search"]["First-Name"] = $search_first_name;
$_SESSION["search"]["Last-Name"] = $search_last_name;

if (!isset($_GET["Job-Reference-No"]) || $search_job_ref_no == "") {
    $sql = "SELECT * FROM eoi WHERE first_name = '$search_first_name' $orderBy ";
} else {
    $sql = "SELECT * FROM eoi WHERE job_reference_no = '$search_job_ref_no' $orderBy ";

}

function test()
{
    if ($_GET["Job-Reference-No"]) {
        return "?Job-Reference-No=" . $_GET["Job-Reference-No"];
    } else if ($_GET["First-Name"] || $_GET["Last-Name"]) {
        return "?first-name=" . $_GET["First-Name"] . "&last-name=" . $_GET["Last-Name"];
    }
}

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
    <main class="manage-result-main">
        <div class="manage-menu">
            <form action="./manage-result.php" method="get">
                <h4>Sorting Menu</h4>
                <select name="sort_by" id="sort-by">
                    <option value="eoi_no">EOI Number</option>
                    <option value="First-Name">First Name</option>
                    <option value="Last-Name">Last Name</option>
                </select>

                <input type="submit" value="Go">
            </form>
            <form action="./manage-result.php" method="post">
                <h4>Action</h4>
                <input type="submit" value="Delete All">
            </form>
        </div>
        <div class="eoi-result">
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
                            echo "<td class='delete-btn'><form action='./delete-eoi.php" . test() . "' method='post'><input type='hidden' name='delete-eoi-id' value=" . $row['EOInumber'] . "/><button>Delete</button></form></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No EOIs found</td></tr>";
                    }
                    mysqli_free_result($result)
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