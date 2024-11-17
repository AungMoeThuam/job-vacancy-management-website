<?php
include_once "./start_session.php";
start_session();
$page = "enhancements";
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
        <h1>Enhancements</h1>

        <section class="enhancement-card">
            <video src="./images/page-transition.mp4" autoplay muted loop></video>
            <article class="description">
                <h2>Page Transition Animation</h2>
                <p>
                    Every page uses a sliding transition effect to create a smooth and
                    dynamic user experience. The transition is achieved by animating the
                    `clip-path` property, which initially hides the page and gradually
                    reveals it from left to right. As the animation progresses, the
                    content smoothly appears, providing a seamless visual flow between
                    pages. This enhances navigation, making the user interaction feel
                    more fluid and engaging.
                </p>
                <a href="./index.php">To Index Page</a>
                <details>
                    <summary>Show Code Implementation</summary>

                    <article class="code">
                        <img src="./images/page-transition-code.png" alt="Page Transition Code" />
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
            <video src="./images/mobile-navbar.mp4" autoplay muted loop></video>
            <article class="description">
                <h2>Mobile Responsiveness Navbar Menu</h2>
                <p>
                    This navigation menu is a responsive design with a toggle-based
                    mobile version. Using a checkbox controller, it enables smooth
                    transitions for opening and closing the mobile menu. The menu
                    overlays the screen with a subtle animation, enhancing user
                    experience. Hover effects for both desktop and mobile views add
                    polish, making the UI more interactive. The implementation involves
                    a flexible HTML structure with a hidden checkbox to trigger menu
                    visibility and CSS transitions, combined with media queries to
                    ensure the desktop and mobile versions work seamlessly.
                </p>
                <a href="#mobile-menu">To Menu</a>
                <details>
                    <summary>Show Code Implementation in about us page</summary>

                    <article class="code">
                        <img src="./images/mobile-navbar-code-1.png" alt="mobile navbar code 1" />
                        <img src="./images/mobile-navbar-code-2.png" alt="mobile navbar code 2" />
                        <img src="./images/mobile-navbar-code-3.png" alt="mobile navbar code 3" />
                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <img src="./images/form.png" alt="form" />
            <article class="description">
                <h2>Form Input Error Messages</h2>
                <p>
                    This is the display of error messages for form validation.
                    Initially, the error messages are hidden (`display: none`). When an
                    input field, select box, or a specific element like `#skill-list` or
                    `#gender` doesn't meet validation rules (using the `:invalid`
                    pseudo-class), the corresponding error message becomes visible
                    (`display: block`). Then, when the input field is valid and focused,
                    the error message is hidden again (`display: none`). This creates a
                    smooth and user-friendly form validation experience, displaying
                    feedback only when necessary.
                </p>
                <a href="./apply.php">To form</a>
                <details>
                    <summary>Show Code Implementation in about us page</summary>

                    <article class="code">
                        <img src="./images/form-code.png" alt="Form Message Code" />
                    </article>
                </details>
            </article>
        </section>
        <section class="enhancement-card">
            <video src="./images/image-scale.mp4" loop muted autoplay></video>
            <article class="description">
                <h2>Image Scale Animation</h2>
                <p>
                    On hover, the image inside the .hometown-card smoothly scales up
                    (transform: scale(1.2)) and slightly reduces opacity (opacity: 0.9),
                    creating a zoom-in effect. This animation is controlled by a
                    transition effect that takes 1 second, giving a slow and smooth zoom
                    as the user hovers over the card. Simultaneously, the hidden
                    .hometown-content becomes visible, overlaying text on the image.
                    This combination of zoom and content reveal adds an engaging
                    interactive experience to the card design
                    <a href="./about.php">To About Page</a>
                <details>
                    <summary>Show Code Implementation</summary>

                    <article class="code">
                        <img src="./images/image-scale-animation-code.png" alt="Image Scale Animation Code" />
                    </article>
                </details>
                </p>
            </article>
        </section>
    </main>

    <?php include "./footer.php" ?>
</body>

</html>