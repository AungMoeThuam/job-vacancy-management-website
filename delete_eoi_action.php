<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include_once "./start_session.php";
start_session();
include_once "./eoi-controller.php";
$eoi_id = $_POST["delete-eoi-id"];
$delete = isset($_POST["delete"]) ? $_POST["delete"] : false;




if ($delete == true) {
    $eoi_controller->delete_single_eoi($eoi_id);
    $url = "location: " . $_SESSION["previous_url"];
    header($url);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Delete EOI</title>
</head>

<body class="delete-body">
    <section class="manage-main">
        <p>Are you sure to delete this eoi?</p>
        <section class="comfirmation-box">
            <form action="./delete_eoi_action.php" method="post">
                <input type="hidden" value="<?php echo true ?>" name="delete">
                <input type="hidden" value="<?php echo $eoi_id ?>" name="delete-eoi-id">
                <button>Yes</button>
            </form>
            <a href="<?php echo $_SESSION["previous_url"] ?>">
                <button>No</button>
            </a>
        </section>
    </section>
</body>

</html>