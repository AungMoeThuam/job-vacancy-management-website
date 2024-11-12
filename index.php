<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>

    <?php include "./header.php" ?>
    <main class="index">
        <section class="hero-second">
            <h1>
                Empowering businesses with cutting-edge solutions to transform ideas
                into reality
            </h1>
            <button><a href="#services">Discover Our Services</a></button>
        </section>
        <section class="hero-first">
            <section class="hero-title">
                <h1>
                    Start <br />
                    Your Career <br />
                    with Us
                </h1>
                <p>
                    Finding a tech team has never been easier. Whether you are looking
                    for a developer, project manager, or designers, Tech for Hire by
                    InspireCode will find you the most suitable candidates for what
                    needs to be built.
                </p>
                <button><a href="./jobs.html"> Find Jobs</a></button>
            </section>
            <img src="./images/person3.svg" alt="career" />
        </section>
        <section id="services" class="service">
            <h2>Our Services</h2>
            <section class="services">
                <section class="services-card">
                    <img src="./images/service-web-app.svg" alt="Web-Development" />
                    <h3>Web Apps</h3>
                    <p>
                        Transform your vision into a stunning, responsive website with our
                        full-stack web development service. We build custom, scalable
                        websites optimized for performance, user experience, and SEO to
                        help your business grow online.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
                <section class="services-card">
                    <img src="./images/service-consultation.svg" alt="IT-Consultation" />
                    <h3>IT Consultation</h3>
                    <p>
                        Empower your business with expert IT advice tailored to your
                        unique needs. Our consultation services help you optimize
                        technology infrastructure, streamline processes, and implement
                        cutting-edge solutions for long-term success.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
                <section class="services-card">
                    <img src="./images/service-desktop-mobile.svg" alt="Desktop-Mobile" />
                    <h3>Desktop & Mobile Apps</h3>
                    <p>
                        Bring your ideas to life with our custom desktop and mobile app
                        development. We create user-friendly, high-performance apps for
                        all platforms, designed to engage users and elevate your business.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
                <section class="services-card">
                    <img src="./images/service-cloud.svg" alt="Cloud-Service" />
                    <h3>Cloud Services</h3>
                    <p>
                        Unlock the power of the cloud with our scalable solutions. From
                        cloud migration to management, we help businesses enhance
                        efficiency, reduce costs, and ensure secure, reliable access to
                        data from anywhere.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
                <section class="services-card">
                    <img src="./images/service-cms.svg" alt="CMS" />
                    <h3>Content Management System</h3>
                    <p>
                        Easily manage and update your website with our custom CMS
                        solutions. We build intuitive platforms that give you full control
                        over your content, allowing you to streamline workflows and keep
                        your site up to date effortlessly.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
                <section class="services-card">
                    <img src="./images/service-cyber-security.svg" alt="Cyber-Security" />
                    <h3>Cyber Security Services</h3>
                    <p>
                        Protect your business with our comprehensive cyber security
                        solutions. We safeguard your systems from threats, ensuring data
                        integrity, privacy, and compliance with the latest security
                        standards.
                    </p>
                    <button class="services-card-btn">MORE INFO</button>
                </section>
            </section>
        </section>
        <section class="team">
            <h2>Our Team</h2>
            <section class="team-members">
                <section class="team-members-card">
                    <img src="./images/aungmoethu.jpg" alt="aung moe thu" />
                    <section class="team-members-card-info">
                        <h3>Aung Moe Thu</h3>
                        <p>Software Engineer</p>
                    </section>
                </section>

                <section class="team-members-card">
                    <img src="./images/swanyeehtoo.jpeg" alt="swan yee htoo" />
                    <section class="team-members-card-info">
                        <h3>Swan Yee Htoo</h3>
                        <p>Cyber Security Expert</p>
                    </section>
                </section>

                <section class="team-members-card">
                    <img src="./images/khantaungnaing.jpg" alt="khant aung naing" />
                    <section class="team-members-card-info">
                        <h3>Khant Aung Naing</h3>
                        <p>Software Engineer</p>
                    </section>
                </section>
            </section>
        </section>
        <section class="partner">
            <h2 class="partner-title">Our partners</h2>
            <section class="partner-companies">
                <a href="https://google.com" target="_blank"><img src="./images/google.png" alt="google" /></a>
                <a href="https://apple.com" target="_blank">
                    <img src="./images/apple.png" alt="apple" /></a>
                <a href="https://facebook.com" target="_blank">
                    <img src="./images/facebook.svg" alt="facebook" />
                </a>
                <a href="https://microsoft.com" target="_blank">
                    <img src="./images/microsoft.png" alt="mircosoft" />
                </a>
            </section>
        </section>
    </main>
    <?php include "./footer.php" ?>
</body>

</html>