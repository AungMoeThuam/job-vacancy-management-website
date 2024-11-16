<?php
session_start();
include_once "./controllers/auth_controller.php";
$auth_controller->check_auth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - InspireCode</title>
    <link rel="stylesheet" href="./styles/style.css" />

</head>

<body>
    <?php include('header.php'); ?>

    <main class="login">
        <h1><?php if ($_SESSION["login_error_message"])
            echo $_SESSION['login_error_message'] ?></h1>
            <section class="login-section">
                <div class="login-container">
                    <h1>Login to InspireCode</h1>
                    <form action="./actions/login_manager.php" method="POST" class="login-form">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email" />

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required placeholder="Enter your password" />

                        <button type="submit" class="login-btn">Login</button>
                    </form>
                </div>
            </section>
        </main>
    <?php include('footer.php'); ?>
</body>

</html>