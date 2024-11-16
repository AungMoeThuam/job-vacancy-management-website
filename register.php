<?php

include_once "./start_session.php";
start_session();
include_once "./auth_controller.php";
$auth_controller->check_auth();
include_once "./error_controller.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - InspireCode</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />

</head>

<body>
    <?php include('header.php'); ?>

    <main class="register">
        <section class="registration-section">
            <div class="registration-container">
                <h1>Create Manager Account</h1>
                <form action="./register_manager_action.php" method="POST" class="registration-form">


                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your full name" />
                    <?php $error_controller->display_error("register_username") ?>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" />
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm_password" required
                        placeholder="Confirm your password" />
                    <?php $error_controller->display_error("register_password") ?>

                    <button type="submit" class="register-btn">Register</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>

</body>

</html>