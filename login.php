<?php
include_once "./utilities/start_session.php";
start_session();
include_once "./controllers/auth_controller.php";
include_once "./controllers/error_controller.php";
var_dump($_SESSION);
$auth_controller->check_auth();
echo $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - InspireCode</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />

</head>

<body>
    <?php include('header.php'); ?>

    <main class="login">
        <section class="login-section">
            <div class="login-container">
                <h1>Login to Manager Dashboard</h1>
                <form action="./actions/login_manager.php" method="POST" class="login-form">


                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your username" />

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" />
                    <?php $error_controller->display_error('login_error_message'); ?>

                    <a href="./register.php"><small>Register New Manager Account</small></a>
                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>