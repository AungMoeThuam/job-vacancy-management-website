<?php
include_once "./start_session.php";
start_session();
include_once "./error_controller.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apply</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>
    <?php include "./header.php" ?>

    <main role="main" class="apply-main">
        <section class="register-photo" aria-labelledby="welcome-message">
            <img src="./images/welcome.svg" alt="Welcome illustration" />
            <h1 id="welcome-message">
                Welcome!<br />Let's Start the journey together!
            </h1>

        </section>

        <form class="manage-form" action="./processEOI.php" method="post" novalidate="novalidate">

            <h2 class="manage-title">Job Application Form</h2>

            <label class="manage-label" for="job_reference_no">Job Reference Number</label>
            <input type="text" class="manage-input manage-textarea" id="job_reference_no" name="job_reference_no"
                required pattern="[0-9a-zA-Z]{5}" placeholder="..." />

            <?php if ($error_controller->get_error("job_reference_no")): ?>
                <p class="error-message">
                    <?php echo $error_controller->get_error("job_reference_no"); ?>
                </p>
            <?php endif; ?>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="first_name">First Name:</label>
                    <input class="manage-input" type="text" id="first_name" name="first_name" value="" required
                        pattern="[a-zA-Z ]{1,20}" />
                    <p class="error-message">
                        First Name is required and only maximum 20 alphabet characters
                        accepted
                    </p>
                </div>
                <div class="form-column">
                    <label class="manage-label" for="last_name">Last Name:</label>
                    <input class="manage-input" type="text" id="last_name" name="last_name" required
                        pattern="[a-zA-Z ]{1,20}" />
                    <p class="error-message">
                        Last Name is required and only maximum 20 alphabet characters
                        accepted
                    </p>
                </div>


            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="date-of-birth">Date of Birth:</label>
                    <input class="manage-input" type="text" id="date_of_birth" name="date_of_birth"
                        pattern="(0?[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[0-2])/([0-9]{4})" required />
                    <p class="error-message">
                        Date of Birth Should be in dd/mm/yyyy format. For example,
                        11/01/2002
                    </p>
                </div>
                <div class="form-column">
                    <label class="manage-label" for="gender">Gender:</label><br>

                    <input type="radio" name="gender" value="Male" required>
                    <label> Male</label><br>

                    <input type="radio" name="gender" value="Female" required>
                    <label>Female </label><br>

                    <p class="error-message">It is required to choose 1 option.</p>

                </div>

            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="email">Email:</label>
                    <input class="manage-input" type="email" id="email" name="email" required />
                    <p class="error-message">Email should be in valid email format.</p>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="phone">Phone:</label>
                    <input class="manage-input" type="phone" id="phone" name="phone" required />
                    <p class="error-message">
                        Phone number should be 8 to 12 digits long and can contain spaces
                    </p>
                </div>


            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="street">Street:</label>
                    <input class="manage-input" type="text" id="street" name="street" pattern=".{1,40}" required />
                    <p class="error-message">
                        Street is required and only maximum 40 characters accepted
                    </p>
                </div>
                <div class="form-column">
                    <label class="manage-label" for="town">Town:</label>
                    <input class="manage-input" type="text" id="town" name="town" pattern=".{1,40}" required />
                    <p class="error-message">
                        Town/Suburb is required and only maximum 40 characters accepted
                    </p>
                </div>

            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="postcode">Postcode:</label>
                    <input class="manage-input" type="text" id="postcode" name="postcode" pattern="[0-9]{4}" required />
                    <p class="error-message">
                        Postcode should be exactly 4 digits with no spaces.
                    </p>
                </div>
                <div class="form-column">
                    <label class="manage-label" for="state">State:</label>
                    <select class="manage-input" name="state" id="state" required>
                        <option value="" disabled selected>Please select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">>SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    <p class="error-message">State is required to choose 1 option.</p>


                </div>

            </div>



            <div class="form-row">

                <div class="form-column">

                    <label class="manage-label">Skills:</label><br>
                    <label>
                        <input type="checkbox" name="skills[]" value="Mobile Development">
                        Mobile Development
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="Web Development">
                        Web Development
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="DevOps">
                        DevOps
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="Database">
                        Database
                    </label><br>

                    <label>
                        <input type="checkbox" name="other" value="Other">
                        Other
                    </label>
                    <p class="error-message">
                        Skill List is required to choose 1 or more options.
                    </p>

                </div>
            </div>

            <label class="manage-label" for="other_skills">Other Skills:</label>
            <textarea class="manage-input manage-textarea" id="other_skills" name="other_skills"
                placeholder="type here..."></textarea>
            <p class="error-message">
                If "Other" is selected in skills list, then you need to enter other skills u have in Other Skills
                textarea.
            </p>

            <button class="manage-button" type="submit">Submit</button>
        </form>
    </main>

    <?php include "./footer.php" ?>
</body>

</html>