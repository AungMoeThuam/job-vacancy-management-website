<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}

include "./settings.php";
$eoi_id = $_POST["delete-eoi-id"];
$delete = $_POST["delete"];

$sql = "DELETE FROM eoi WHERE EOInumber = '$eoi_id'";
function test()
{
    if ($_GET["Job-Reference-No"]) {
        return "?Job-Reference-No=" . $_GET["Job-Reference-No"];
    } else if ($_GET["First-Name"] || $_GET["Last-Name"]) {
        return "?first-name=" . $_GET["First-Name"] . "&last-name=" . $_GET["Last-Name"];
    }
}

if ($delete == true) {
    $conn->query($sql);
    $url = "location: ./manage-result.php" . test();
    header($url);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Delete EOI</title>
</head>

<body class="delete-body">
    <section class="manage-main">
        <p>Are you sure to delete this eoi?</p>
        <section class="comfirmation-box">
            <form action="./delete-eoi.php<?php echo test() ?>&eoi-id=<?php echo $eoi_id ?>&delete=true" method="post">
                <input type="hidden" value="<?php echo true ?>" name="delete">
                <input type="hidden" value="<?php echo $eoi_id ?>" name="delete-eoi-id">
                <button>Yes</button>
            </form>
            <a href="./manage-result.php<?php echo test() ?>">
                <button>No</button>
            </a>
        </section>
    </section>
</body>

</html>