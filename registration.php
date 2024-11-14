<?php

include "./utilities/start_session.php";
start_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - InspireCode</title>
    <link rel="stylesheet" href="./styles/style.css" />

</head>

<body>
    <?php include('header.php'); ?>

    <main class="register">
        <section class="registration-section">
            <div class="registration-container">
                <h1>Create Manager Account</h1>
                <form action="process_registration.php" method="POST" class="registration-form">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name" />

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email" />


                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" />

                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm_password" required
                        placeholder="Confirm your password" />

                    <button type="submit" class="register-btn">Register</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>

</body>

</html>