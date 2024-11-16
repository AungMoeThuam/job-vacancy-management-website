<?php
include "./utilities/start_session.php";
start_session();
include_once "./controllers/auth_controller.php";
$auth_controller->check_auth();
include_once "./controllers/eoi-controller.php";

$EOInumber = $_GET["EOInumber"];
$row = $eoi_controller->get_single_eoi_row($EOInumber);  // Returns the first row as an associative array



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Detail</title>
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />

</head>

<body>
    <?php include 'header.php'; ?>
    <main class="manage-detail-main">
        <h2 class="manage-title">Edit EOI Number - <?php echo $row['EOInumber']; ?></h2>

        <form class="manage-form" action="./actions/update_eoi.php" method="post">
            <input type="hidden" name="EOInumber" value="<?php echo $row['EOInumber']; ?>">

            <label class="manage-label" for="job_reference_no">Job Reference No:</label>
            <input class="manage-input" type="text" id="job_reference_no" name="job_reference_no"
                value="<?php echo $row['job_reference_no']; ?>" required />



            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="first_name">First Name:</label>
                    <input class="manage-input" type="text" id="first_name" name="first_name"
                        value="<?php echo $row['first_name']; ?>" required />
                </div>
                <div class="form-column">
                    <label class="manage-label" for="last_name">Last Name:</label>
                    <input class="manage-input" type="text" id="last_name" name="last_name"
                        value="<?php echo $row['last_name']; ?>" required />
                </div>

            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="date-of-birth">Date of Birth:</label>
                    <input class="manage-input" type="text" id="date_of_birth" name="date_of_birth"
                        value="<?php echo $row['date_of_birth']; ?>" required />
                </div>
                <div class="form-column">
                    <label class="manage-label" for="gender">Gender:</label>


                    <select class="manage-input" id="gender" name="gender" required>
                        <option value="Female" <?php echo $row['gender'] == 'Female' ? 'selected' : ''; ?>>Female
                        </option>
                        <option value="Male" <?php echo $row['gender'] == 'Female' ? 'selected' : ''; ?>>Male
                        </option>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="email">Email:</label>
                    <input class="manage-input" type="email" id="email" name="email"
                        value="<?php echo $row['email']; ?>" required />
                </div>
                <div class="form-column">
                    <label class="manage-label" for="phone">Phone:</label>
                    <input class="manage-input" type="phone" id="phone" name="phone"
                        value="<?php echo $row['phone']; ?>" required />
                </div>


            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="street">Street:</label>
                    <input class="manage-input" type="text" id="street" name="street"
                        value="<?php echo $row['street']; ?>" required />
                </div>
                <div class="form-column">
                    <label class="manage-label" for="town">Town:</label>
                    <input class="manage-input" type="text" id="town" name="town" value="<?php echo $row['town']; ?>"
                        required />
                </div>

            </div>

            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="postcode">Postcode:</label>
                    <input class="manage-input" type="text" id="postcode" name="postcode"
                        value="<?php echo $row['postcode']; ?>" required />
                </div>
                <div class="form-column">
                    <label class="manage-label" for="state">State:</label>
                    <select class="manage-input" name="state" id="state" required>
                        <option value="VIC" <?php echo $row['state'] == 'VIC' ? 'selected' : ""; ?>>VIC</option>
                        <option value="NSW" <?php echo $row['state'] == 'NSW' ? 'selected' : ""; ?>>NSW</option>
                        <option value="QLD" <?php echo $row['state'] == 'QLD' ? 'selected' : ""; ?>>QLD</option>
                        <option value="NT" <?php echo $row['state'] == 'NT' ? 'selected' : ""; ?>>NT</option>
                        <option value="WA" <?php echo $row['state'] == 'WA' ? 'selected' : ""; ?>>WA</option>
                        <option value="SA" <?php echo $row['state'] == 'SA' ? 'selected' : ""; ?>>SA</option>
                        <option value="TAS" <?php echo $row['state'] == 'TAS' ? 'selected' : ""; ?>>TAS</option>
                        <option value="ACT" <?php echo $row['state'] == 'ACT' ? 'selected' : ""; ?>>ACT</option>
                    </select>

                </div>

            </div>



            <div class="form-row">
                <div class="form-column">
                    <label class="manage-label" for="status">Status:</label>
                    <select class="manage-input" id="status" name="status" required>
                        <option value="New" <?php echo $row['status'] == 'New' ? 'selected' : ''; ?>>New</option>
                        <option value="Current" <?php echo $row['status'] == 'Current' ? 'selected' : ''; ?>>Current
                        </option>
                        <option value="Final" <?php echo $row['status'] == 'Final' ? 'selected' : ''; ?>>Final</option>
                    </select>
                </div>
                <div class="form-column">

                    <label class="manage-label">Skills:</label><br>
                    <label>
                        <input type="checkbox" name="skills[]" value="Mobile Development"
                            <?php echo $row["skill1"] == "Mobile Development" ?  "checked" : ""; ?>>
                        Mobile Development
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="Web Development"
                            <?php  echo $row["skill2"] == "Web Development" ?  "checked" : ""; ?>>
                        Web Development
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="DevOps"
                            <?php  echo $row["skill3"] == "DevOps" ?  "checked" : ""; ?>>
                        DevOps
                    </label><br>

                    <label>
                        <input type="checkbox" name="skills[]" value="Database"
                            <?php echo $row["skill4"] == "Database" ?  "checked" : ""; ?>>
                        Database
                    </label><br>

                    <label>
                        <input type="checkbox" name="other" value="Other">
                        Other
                    </label>

                </div>
            </div>

            <label class="manage-label" for="other_skills">Other Skills:</label>
            <textarea class="manage-input manage-textarea" id="other_skills"
                name="other_skills"><?php echo $row['other_skills']; ?></textarea>

            <button class="manage-button" type="submit">Update Details</button>
        </form>
    </main>

    <?php
    include 'footer.php';
    ?>

</body>

</html>