<?php
include_once "./start_session.php";
start_session();
$page = "enhancements2";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enhancements</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>
    <?php include "./header.php" ?>

    <main class="enhancement">
        <h1>Enhancements2</h1>

        <section class="enhancement-card">
            <img src="images/retriving_database.png" alt="Retriving Database">
            <article class="description">
                <h2>Displaying Job Discription By Retriving From Database</h2>
                <p>
                    Job details are retrieved from the database using server-side scripting, and the data is displayed
                    dynamically by looping through
                    the fetched records. Each job entry is processed within a loop, ensuring that multiple listings are
                    displayed efficiently without
                    redundant code. For each iteration of the loop, information such as the job title, reference number,
                    location, salary range, and
                    qualifications is extracted and rendered into structured HTML elements. This approach not only
                    simplifies the code but also ensures
                    that any updates in the database are immediately reflected on the webpage.
                </p>

                <a href="./jobs.php">To Job Page</a>
                <details>
                    <summary>Show Code Implementation</summary>

                    <article class="code">
                        <img src="./images/job_code.png" alt="Retriving Database Code" />
                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <video src="./images/responsiveness.mp4" autoplay muted loop></video>
            <article class="description">
                <h2>Responsiveness</h2>
                <p>
                    Every page is responsive. We use media query for each page to make
                    it responsive. Depending on different style and content of the
                    pages, we had to implement different rules for each page. The
                    following code is for about us page.
                </p>
                <a href="./about.php">To About Us Page</a>
                <details>
                    <summary>Show Code Implementation in about us page</summary>

                    <article class="code">
                        <img src="./images/responsiveness-code.png" alt="About Us Page Responsiveness Code" />
                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <img src="./images/login_logout.png" alt="login" />
            <article class="description">
                <h2>Login and Logout For Manager</h2>
                <p>
                    The login functionality enables users to securely access the manager dashboard by entering their
                    registered username and password.
                    The submitted credentials are verified against the database, ensuring authorized access only. Upon
                    successful login, a session is initiated,
                    and users can manage job data and other administrative tasks.
                    Logout functionality is equally important as it terminates the active session, preventing
                    unauthorized access to the dashboard after the user leaves.
                    This ensures enhanced security by requiring users to log in again for subsequent sessions,
                    safeguarding sensitive data and maintaining a secure workflow.
                </p>


                <a href="./login.php">To login</a>
                <details>
                    <summary>Show Code Implementation in about us page</summary>

                    <article class="code">
                        <img src="./images/login.png" alt="login code " />

                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <img src="./images/form.png" alt="form" />
            <article class="description">
                <h2>Page Management</h2>
                <p>
                    In a web application, the manager page should be accessible only to authenticated users.
                    If a user has not logged in, they will be unable to access the manager page.
                    This is typically achieved by checking if the user's session contains valid authentication data
                    (such as their username).
                    The `Manager_Controller` class manages interactions with the database, such as finding existing
                    managers and creating new ones.
                    It contains functions like `find_manager_by_username`, which checks if a manager exists by their
                    username, and `find_manager`,
                    which verifies both the username and password to authenticate the manager.
                    If the manager is not logged in or their session is not active, any attempt to access the manager
                    page will be blocked,
                    and they will be redirected to the login page. This ensures that only authenticated managers can
                    view or manage sensitive information within the system.
                    The `create_manager` function allows for the registration of new managers by adding them to the
                    database,
                    ensuring that only authorized users can manage the system's resources.
                </p>

                <a href="./manage.php">To Manage</a>
                <details>
                    <summary>Show Code Implementation in about us page</summary>

                    <article class="code">
                        <img src="./images/manage_page.png" alt="Form Message Code" />
                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <video src="./images/image-scale.mp4" loop muted autoplay></video>
            <article class="description">
                <h2>Manage registration</h2>
                <p>
                    The manager registration process ensures that new managers can create an account with a unique
                    username and matching passwords.
                    If the passwords do not match or the username is already taken, error messages are displayed.
                    Once the manager's details are validated, their account is created in the database, and they are
                    automatically logged in.
                    The session is started by setting the `$_SESSION['auth']` variable, granting the manager access to
                    the management dashboard.
                    Error handling is integrated throughout the process to inform the user of any issues,
                    ensuring a smooth and secure registration experience.
                    <a href="./register_manager.php">To Registration Page</a>
                <details>
                    <summary>Show Code Implementation</summary>

                    <article class="code">
                        <img src="./images/registor.png" alt="Registration Management Code" />
                    </article>
                </details>
                </p>
            </article>
        </section>
    </main>

    <?php include "./footer.php" ?>
</body>

</html>