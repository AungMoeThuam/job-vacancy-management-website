<?php
include_once "./start_session.php";
start_session();
include_once "./auth_controller.php";
$auth_controller->check_auth();
$page = "manage";

include './settings.php';


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
        <h3 class="manage-title">Manage Job Applications</h3>
        <div class="search">
            <a href="./manage.php?search-by=job-ref-no" <?php if (isset($_GET["search-by"]) && $_GET["search-by"] == "job-ref-no") {
                echo "class='active'";
            } ?>>
                Search by Job Reference No
            </a>
            <a href="./manage.php?search-by=names" <?php if (isset($_GET["search-by"]) && $_GET["search-by"] == "names") {
                echo "class='active'";
            } ?>>
                Search by Name
            </a>
            <a href="./manage-result.php?eoi=all&sort-by=">
                View All
            </a>
        </div>

        <div>
            <?php if (!isset($_GET["search-by"]) || $_GET["search-by"] == "job-ref-no"): ?>
                <form action="./manage-result.php" method="get" class="searching-box">
                    <input class="manage-input" type="text" name="Job-Reference-No" id="Job-Reference-No"
                        placeholder="Job Reference No">
                    <input type="hidden" name="sort-by" id="sort-by" value="">
                    <input class="manage-button" type="submit" value="search">
                </form>
            <?php endif ?>

            <?php
            if (isset($_GET["search-by"]) && $_GET["search-by"] == "names"):
                ?>
                <form action="./manage-result.php" method="get" class="searching-box">
                    <input class="manage-input" type="text" name="First-Name" id="First-Name" placeholder="First Name">
                    <input class="manage-input" type="text" name="Last-Name" id="Last-Name" placeholder="Last Name">
                    <input type="hidden" name="sort-by" id="sort-by" value="">
                    <input class="manage-button" type="submit" value="search">
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