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

    <main role="main" id="apply" class="apply">
        <section class="register-photo" aria-labelledby="welcome-message">
            <img src="./images/welcome.svg" alt="Welcome illustration" />
            <h1 id="welcome-message">
                Welcome!<br />Let's Start the journey together!
            </h1>
        </section>

        <section class="form-container">
            <form action="./test.php" method="post" novalidate="novalidate" aria-labelledby="application-form-title">
                <h2 id="application-form-title">Job Application Form</h2>
                <section class="input-group">
                    <label for="Job-Reference-Number">Job Reference Number</label>
                    <input type="text" name="Job-Reference-Number" id="Job-Reference-Number" placeholder="..."
                        pattern="[0-9a-zA-Z]{5}" required />
                    <p class="error-message">
                        Job Reference Number is required and exactly 5 alphanumeric
                        characters accepted.
                    </p>
                </section>

                <section class="input-group">
                    <label for="First_Name">First Name</label>
                    <input type="text" name="First_Name" id="First_Name" placeholder="Enter first name"
                        pattern="[a-zA-Z ]{1,20}" required />
                    <p class="error-message">
                        First Name is required and only maximum 20 alphabet characters
                        accepted
                    </p>
                </section>

                <section class="input-group">
                    <label for="Last_Name">Last Name</label>
                    <input type="text" name="Last_Name" id="Last_Name" placeholder="Enter last name"
                        pattern="[a-zA-Z ]{1,20}" required />
                    <p class="error-message">
                        Last Name is required and only maximum 20 alphabet characters
                        accepted
                    </p>
                </section>

                <section class="input-group">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email" placeholder="example@example.com" required />
                    <p class="error-message">Email should be in valid email format.</p>
                </section>

                <section class="input-group">
                    <label for="Phone">Phone</label>
                    <input type="text" name="Phone" id="Phone" placeholder="Enter phone number" pattern="[0-9 ]{8,12}"
                        required />
                    <p class="error-message">
                        Phone number should be 8 to 12 digits long and can contain spaces
                    </p>
                </section>

                <section class="input-group">
                    <label for="Date_Of_Birth">Date of Birth</label>
                    <input type="text" name="Date_Of_Birth" id="Date_Of_Birth"
                        pattern="(0?[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[0-2])/([0-9]{4})" placeholder="dd/mm/yyyy"
                        required />
                    <p class="error-message">
                        Date of Birth Should be in dd/mm/yyyy format. For example,
                        11/01/2002
                    </p>
                </section>

                <fieldset class="input-group" aria-labelledby="gender-legend" id="gender">
                    <legend id="gender-legend">Gender</legend>
                    <label for="male">
                        <input type="radio" name="Gender" id="male" value="Male" required />
                        Male
                    </label>
                    <label for="female">
                        <input type="radio" name="Gender" id="female" value="Female" required />
                        Female
                    </label>
                    <p class="error-message">It is required to choose 1 option.</p>
                </fieldset>

                <section class="input-group">
                    <label for="Postcode">Postcode</label>
                    <input type="text" name="Postcode" id="Postcode" pattern="[0-9]{4}" placeholder="1234" required />
                    <p class="error-message">
                        Postcode should be exactly 4 digits with no spaces.
                    </p>
                </section>

                <section class="input-group">
                    <label for="Street">Street</label>
                    <input type="text" name="Street" id="Street" placeholder="St.." is required and pattern=".{1,40}"
                        required />
                    <p class="error-message">
                        Street is required and only maximum 40 characters accepted
                    </p>
                </section>

                <section class="input-group">
                    <label for="Town">Suburb/Town</label>
                    <input type="text" name="Town" id="Town" placeholder="Town.." pattern=".{1,40}" required />
                    <p class="error-message">
                        Suburb/Town is required and only maximum 40 characters accepted
                    </p>
                </section>

                <section class="input-group">
                    <label for="State">State</label>
                    <select name="State" id="State" required>
                        <option value="" disabled selected>Please select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    <p class="error-message">State is required to choose 1 option.</p>
                </section>


                <fieldset class="input-group" aria-labelledby="skills-legend" id="skill-list">
                    <legend id="skills-legend">Skill List</legend>
                    <label for="mobile-development">
                        <input checked id="mobile-development" type="checkbox" name="Skill-List[]"
                            value="Mobile Development" />
                        Mobile Development
                    </label>
                    <label for="web-development">
                        <input id="web-development" type="checkbox" name="Skill-List[]" value="Web Development" />
                        Web Development
                    </label>
                    <label for="devop">
                        <input id="devop" type="checkbox" name="Skill-List[]" value="DevOps" />
                        DevOps
                    </label>
                    <label for="database">
                        <input id="database" type="checkbox" name="Skill-List[]" value="Database" />
                        Database
                    </label>
                    <label for="Other-Skills">
                        <input type="checkbox" name="Skill-List[]" value="Other-Skills" id="Other-Skills" />
                        Other
                    </label>
                    <p class="error-message">
                        Skill List is required to choose 1 or more options.
                    </p>
                </fieldset>

                <section class="input-group" id="Other-Skills-Textarea">
                    <label for="Other-Skills-Input">Other Skills</label>
                    <textarea name="Other-Skills" id="Other-Skills-Input"
                        placeholder="List other skills here..."></textarea>
                </section>

                <button type="submit" aria-label="Submit job application">
                    Submit
                </button>
            </form>
        </section>
    </main>

    <?php include "./footer.php" ?>
</body></html>