<?php
session_start();


include './settings.php';

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

<body class="manage">
    <?php include "./header.php" ?>


    <main class="manage-main">
        <div class="search-by">
            <a href="./manage.php?search-by=job-ref-no">
                <input type="radio" <?php if (!isset($_GET["search-by"]) || $_GET["search-by"] == "job-ref-no")
                    echo "checked" ?>>
                    Search by Job Reference No
                </a>
                <a href="./manage.php?search-by=names">
                    <input type="radio"
                    <?php if (isset($_GET["search-by"]) && $_GET["search-by"] == "names")
                    echo "checked" ?>
                    >
                    Search by Name
                </a>
            </div>

            <div>
            <?php if (!isset($_GET["search-by"]) || $_GET["search-by"] == "job-ref-no"): ?>
                <form action="./manage-result.php" method="get" class="searching-box" >
                    <input type="text" name="Job-Reference-No" id="Job-Reference-No" placeholder="Job Reference No">
                    <input type="submit" value="search">
                </form>
            <?php endif ?>

            <?php
            if (isset($_GET["search-by"]) && $_GET["search-by"] == "names"):
                ?>
                <form action="./manage-result.php" method="get" class="searching-box" >
                    <input type="text" name="First-Name" id="First-Name" placeholder="First Name">
                    <input type="text" name="Last-Name" id="Last-Name" placeholder="Last Name">
                    <input type="submit" value="search">
                </form>
            <?php endif ?>
        </div>
    </main>

    <?php include "./footer.php" ?>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>