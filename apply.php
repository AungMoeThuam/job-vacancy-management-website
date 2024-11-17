<?php
include_once "./start_session.php";
start_session();
include_once "./error_controller.php";
$page = "apply";
$form = isset($_SESSION["form"]) ? $_SESSION["form"] : null;
var_dump($form);
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
                required pattern="[0-9a-zA-Z]{5}" placeholder="example GACA1" value="<?php if (isset($form["job_reference_no"]))
                    echo $form["job_reference_no"]; ?>" />


            <?php echo $error_controller->display_error("job_reference_no"); ?>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="first_name">First Name:</label>
                    <input class="manage-input" type="text" id="first_name" name="first_name" required
                        pattern="[a-zA-Z ]{1,20}" value="<?php if (isset($form["first_name"]))
                            echo $form["first_name"]; ?>" />
                    <?php echo $error_controller->display_error("first_name"); ?>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="last_name">Last Name:</label>
                    <input class="manage-input" type="text" id="last_name" name="last_name" required
                        pattern="[a-zA-Z ]{1,20}" value="<?php if (isset($form["last_name"]))
                            echo $form["last_name"]; ?>" />
                    <?php echo $error_controller->display_error("last_name"); ?>

                </div>


            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="date-of-birth">Date of Birth:</label>
                    <input class="manage-input" type="text" id="date_of_birth" name="date_of_birth"
                        pattern="(0?[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[0-2])/([0-9]{4})" required value="<?php if (isset($form["date_of_birth"]))
                            echo $form["date_of_birth"]; ?>" />
                    <?php echo $error_controller->display_error("date_of_birth"); ?>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="gender">Gender:</label><br>

                    <input type="radio" name="gender" value="Male" required <?php
                    if (isset($form["gender"]) && $form["gender"] == "Male")
                        echo "checked";

                    ?>>
                    <label> Male</label><br>

                    <input type="radio" name="gender" value="Female" required <?php
                    if (isset($form["gender"]) && $form["gender"] == "Female")
                        echo "checked";

                    ?>>
                    <label>Female </label><br>

                    <?php echo $error_controller->display_error("gender"); ?>

                </div>

            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="email">Email:</label>
                    <input class="manage-input" type="email" id="email" name="email" required value="<?php if (isset($form["email"]))
                        echo $form["email"]; ?>" />
                    <?php echo $error_controller->display_error("email"); ?>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="phone">Phone:</label>
                    <input class="manage-input" type="phone" id="phone" name="phone" required value="<?php if (isset($form["phone"]))
                        echo $form["phone"]; ?>" />
                    <?php echo $error_controller->display_error("phone"); ?>

                </div>


            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="street">Street:</label>
                    <input class="manage-input" type="text" id="street" name="street" pattern=".{1,40}" required value="<?php if (isset($form["street"]))
                        echo $form["street"]; ?>" />
                    <?php echo $error_controller->display_error("street"); ?>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="town">Town:</label>
                    <input class="manage-input" type="text" id="town" name="town" pattern=".{1,40}" required value="<?php if (isset($form["town"]))
                        echo $form["town"]; ?>" />
                    <?php echo $error_controller->display_error("town"); ?>

                </div>

            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="postcode">Postcode:</label>
                    <input class="manage-input" type="text" id="postcode" name="postcode" pattern="[0-9]{4}" required
                        value="<?php if (isset($form["postcode"]))
                            echo $form["postcode"]; ?>" />
                    <?php echo $error_controller->display_error("postcode"); ?>

                </div>
                <div class="form-column">
                    <label class="manage-label" for="state">State:</label>
                    <select class="manage-input" name="state" id="state" required>
                        <option value="" disabled <?php if (!isset($form["state"]))
                            echo "selected";
                        ?>>Please select</option>
                        <option value="VIC" <?php if (isset($form["state"]) && $form["state"] == "VIC")
                            echo "selected";
                        ?>>VIC</option>
                        <option value="NSW" <?php if (isset($form["state"]) && $form["state"] == "NSW")
                            echo "selected";
                        ?>>NSW</option>
                        <option value="QLD" <?php if (isset($form["state"]) && $form["state"] == "QLD")
                            echo "selected";
                        ?>>QLD</option>
                        <option value="NT" <?php if (isset($form["state"]) && $form["state"] == "NT")
                            echo "selected";
                        ?>>NT</option>
                        <option value="WA" <?php if (isset($form["state"]) && $form["state"] == "WA")
                            echo "selected";
                        ?>>WA</option>
                        <option value="SA" <?php if (isset($form["state"]) && $form["state"] == "SA")
                            echo "selected";
                        ?>> SA</option>
                        <option value="TAS" <?php if (isset($form["state"]) && $form["state"] == "TAS")
                            echo "selected";
                        ?>>TAS</option>
                        <option value="ACT" <?php if (isset($form["state"]) && $form["state"] == "ACT")
                            echo "selected";
                        ?>>ACT</option>
                    </select>
                    <?php echo $error_controller->display_error("state"); ?>


                </div>

            </div>



            <div class="form-row">

                <div class="form-column">

                    <label class="manage-label">Skills:</label><br>

                    <input type="checkbox" name="skills[]" value="Mobile Development" <?php if (isset($form["skills"]) && in_array("Mobile Development", $form["skills"]))
                        echo "checked"; ?>>
                    Mobile Development
                    <br>


                    <input type="checkbox" name="skills[]" value="Web Development" <?php if (isset($form["skills"]) && in_array("Web Development", $form["skills"]))
                        echo "checked"; ?>>
                    Web Development
                    <br>


                    <input type="checkbox" name="skills[]" value="DevOps" <?php if (isset($form["skills"]) && in_array("DevOps", $form["skills"]))
                        echo "checked"; ?>>
                    DevOps
                    <br>


                    <input type="checkbox" name="skills[]" value="Database" <?php if (isset($form["skills"]) && in_array("Database", $form["skills"]))
                        echo "checked"; ?>>
                    Database
                    <br>


                    <input type="checkbox" name="other" value="Other" <?php if (isset($form["other"]) && $form["other"] == "Other")
                        echo "checked"; ?>>
                    Other


                    <?php echo $error_controller->display_error("skills"); ?>

                </div>
            </div>

            <label class="manage-label" for="other_skills">Other Skills:</label>
            <textarea class="manage-input manage-textarea" id="other_skills" name="other_skills"
                placeholder="type here..." value="<?php if (isset($form["other_skills"]))
                    echo $form["other_skills"] ?>"></textarea>
            <?php echo $error_controller->display_error("other_skills"); ?>


            <button class="manage-button" type="submit">Submit</button>
        </form>
    </main>

    <?php include "./footer.php" ?>
</body>

</html>