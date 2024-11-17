<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location: ./index.php");
    exit();
}
include "./start_session.php";
start_session();
include_once "./error_controller.php";
include_once "./eoi-controller.php";
include_once "./validate_input.php";




$error_controller->clear_all_errors();
unset($_SESSION["form"]);
$new_eoi = validate_form($_POST);

$_SESSION["form"] = $_POST;
if ($new_eoi[0] === false) { //if validation failed
    foreach ($new_eoi[1] as $key => $value) {
        $error_controller->set_error($key, $value);
    }
    header("location: ./apply.php");
    exit();
}

//if validation passed, then create new eoi
$result = $eoi_controller->create_eoi($new_eoi[1]);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create EOi</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="manage">
    <main class="manage-main">
        <?php if (!$result): ?>
            <p class="manage-title">Invalid Job Reference Number! </p>
            <button><a href="./apply.php">Go Back</a></button>
        <?php else: ?>
            <?php
            unset($_SESSION["form"]) ?>

            <p class="manage-title">Your have submitted job application!</p>
            <button><a href="./apply.php">Go Back</a></button>

        <?php endif ?>
    </main>
</body>

</html>