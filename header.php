<?php
include_once "./auth_controller.php";
?>
<header>
    <nav>
        <a href="index.php"><img class="logo" src="./images/logo.svg" alt="Logo Icon" /></a>
        <ul class="menu">
            <li><a <?php if ($page == "home")
                echo "class='active'" ?> href="./index.php">Home</a></li>
                <li><a <?php if ($page == "jobs")
                echo "class='active'" ?> href="./jobs.php">Jobs</a></li>
                <li><a <?php if ($page == "about")
                echo "class='active'" ?> href="./about.php">About</a></li>
                <li><a <?php if ($page == "enhancements")
                echo "class='active'" ?> href="./enhancements.php">Enhancements</a>
                </li>
                <li><a <?php if ($page == "enhancements2")
                echo "class='active'" ?>
                        href="./enhancements2.php">Enhancements2</a></li>
            <?php if ($_SESSION["auth"]): ?>
                <li><a <?php if ($page == "manage")
                    echo "class='active'" ?> href="./manage.php">Manage</a></li>
            <?php endif ?>
            <li><a <a <?php if ($page == "apply")
                echo "class='active'" ?> href="./apply.php">Apply Now</a></li>
            <?php if ($_SESSION["auth"]): ?>
                <li><a href="./logout.php">Logout</a></li>
            <?php else: ?>
                <li><a <a <?php if ($page == "login")
                    echo "class='active'" ?> href="./login.php">Login</a></li>
            <?php endif ?>

        </ul>
        <input type="checkbox" name="toggle-menu-controller" id="toggle-menu-controller" aria-hidden="true" />
        <label id="mobile-menu-close-trigger" for="toggle-menu-controller" aria-label="Close menu"></label>
        <button class="mobile-menu-btn" aria-label="Open mobile menu">
            <label for="toggle-menu-controller">
                <img src="./images/menu-icon.svg" alt="Menu Icon" />
            </label>
        </button>
        <ul class="mobile-menu" aria-hidden="true">
            <li>
                <label for="toggle-menu-controller" aria-label="Close menu">
                    <img src="./images/menu-close.svg" alt="Close Menu Icon" />
                </label>
            </li>
            <li><a class="active" href="./index.php">Home</a></li>
            <li><a href="./jobs.php">Jobs</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./enhancements.php">Enhancements</a></li>
            <li><a href="./enhancements2.php">Enhancements2</a></li>
            <li><a href="./apply.php">Apply Now</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
</header>