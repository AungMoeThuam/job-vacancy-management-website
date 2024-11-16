<?php
include "./utilities/start_session.php";
start_session();
include_once "./controllers/job_description_controller.php";
include_once "./utilities/to_array.php";
$job_descriptions = $job_description_controller->get_all_job_rows();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jobs</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="icon" href="./images/logo.svg" />
</head>

<body>
    <?php include "./header.php" ?>

    <main class="jobs">
        <h1>Welcome again, Let's Find Your Job!</h1>

        <section class="job-detail-list">
            <?php foreach ($job_descriptions as $job): ?>
                <section class="job-detail" id="<?php echo $job["job_reference_no"] ?>">
                    <h2><?php echo $job["title"] ?></h2>
                    <p><strong><?php echo $job["salary_range"] ?></strong></p>
                    <section class="location">
                        <p>
                            <?php echo $job["working_from"] ?>
                        </p>
                    </section>
                    <section class="job-type">
                        <p> <?php echo $job["working_hour"] ?>
                        </p>
                    </section>
                    <p><strong>Reference Number: <?php echo $job["job_reference_no"] ?></strong> </p>
                    <p><strong>Reports To:</strong> <?php echo $job["reports_to"] ?></p>

                    <section class="job-description">
                        <h3>Job Description</h3>
                        <p>
                            <?php echo $job["description"] ?>
                        </p>

                        <h3>Key Responsibilities</h3>
                        <ul>
                            <?php foreach (to_array($job["responsibilities"]) as $res): ?>
                                <li>
                                    <?php echo $res ?>
                                </li>
                            <?php endforeach; ?>

                        </ul>

                        <h3>Qualifications</h3>
                        <h4>Essential</h4>
                        <ol>
                            <?php foreach (to_array($job["essential_qualifications"]) as $esq): ?>
                                <li>
                                    <?php echo $esq ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>

                        <h4>Preferable</h4>
                        <ol>
                            <?php foreach (to_array($job["preferable_qualifications"]) as $psq): ?>
                                <li>
                                    <?php echo $psq ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </section>
                    <a class="reference" href="<?php echo $job["reference"] ?>">Reference</a>
                    <a href="./apply.html"><button>Apply Now</button></a>
                </section>

            <?php endforeach; ?>

        </section>
        <aside class="job-list">
            <?php foreach ($job_descriptions as $job): ?>
                <section class="position-card">
                    <h3><?php echo $job["title"] ?></h3>
                    <section class="location">
                        <p><?php echo $job["working_from"] ?></p>
                    </section>
                    <section class="salary">
                        <p><?php echo $job["salary_range"] ?></p>
                        <a href="#<?php echo $job["job_reference_no"] ?>">view</a>
                    </section>
                </section>
            <?php endforeach; ?>
        </aside>
    </main>
    <a href="#" class="back-to-start-btn"> Back To Up </a>

    <?php include "./footer.php" ?>
</body>

</html>