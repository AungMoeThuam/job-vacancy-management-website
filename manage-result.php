<?php
include_once "./start_session.php";
start_session();
include_once "./auth_controller.php";
$auth_controller->check_auth();
include_once "./eoi-controller.php";
$page = "manage";
// Set default sorting option
$sortBy = "EOInumber"; // Default is sorting by EOInumber

// Check if sorting option is selected via GET
if (isset($_GET['sort-by'])) {
    $sortBy = $_GET['sort-by']; // Can be 'first_name', 'last_name', or 'both'
}

function check($key)//function to check a key is set in $_GET or not
{
    return !isset($_GET[$key]) ? "" : $_GET[$key];
}
$search_by_all = check("eoi");
$search_job_ref_no = check("Job-Reference-No");
$search_first_name = check("First-Name");
$search_last_name = check("Last-Name");

$_SESSION["previous_url"] = $_SERVER["REQUEST_URI"];

function display_skill_if_exist($skill)//to display skill from database data
{
    return $skill == "0" ? "" : $skill . ", ";
}

function search_by($array) //function to check search by all, job reference or names
{
    if ($array[0] == "all")
        return $array[0];
    else if ($array[1] != "")
        return $array[1];
    else
        return [$array[2], $array[3]];
}

$result = $eoi_controller->get_all_eoi_rows(search_by([$search_by_all, $search_job_ref_no, $search_first_name, $search_last_name]), $sortBy);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.svg" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Manage EOIs</title>
</head>

<body>
    <?php include "./header.php" ?>
    <main class="manage-result-main">
        <div class="manage-menu">
            <form action="./manage-result.php" method="get">
                <h4>Sorting Menu</h4>
                <select name="sort-by" id="sort-by">
                    <option value="eoi_no" <?php if ($_GET["sort-by"] == "eoi_no")
                        echo "selected" ?>>EOI Number
                        </option>
                        <option value="First-Name" <?php if ($_GET["sort-by"] == "First-Name")
                        echo "selected" ?>>First Name
                        </option>
                        <option value="Last-Name" <?php if ($_GET["sort-by"] == "Last-Name")
                        echo "selected" ?>>Last Name
                        </option>
                        <option value="both" <?php if ($_GET["sort-by"] == "both")
                        echo "selected" ?>>By Name</option>
                    </select>

                <?php if ($search_by_all): ?>
                    <input type="hidden" name="eoi" value="<?php echo $search_by_all; ?>" />
                <?php endif; ?>
                <?php if ($search_first_name): ?>
                    <input type="hidden" name="First-Name" value="<?php echo $search_first_name; ?>" />
                <?php endif; ?>
                <?php if ($search_last_name): ?>
                    <input type="hidden" name="Last-Name" value="<?php echo $search_last_name; ?>" />
                <?php endif; ?>
                <?php if ($search_job_ref_no): ?>
                    <input type="hidden" name="Job-Reference-No" value="<?php echo $search_job_ref_no; ?>" />
                <?php endif; ?>

                <input type="submit" value="Go">
            </form>
            <a href="./manage.php" class="back-btn">
                Back
            </a>
        </div>
        <div class="eoi-result">
            <table>
                <thead>
                    <tr>
                        <th>EOI No</th>
                        <th>Job Ref</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Skills</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            echo "<tr>";
                            echo "<td>" . $row['EOInumber'] . "</td>";
                            echo "<td>" . $row['job_reference_no'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['date_of_birth'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['street'] . ", " . $row['postcode'] . ", " . $row['town'] . ", " . $row['state'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . display_skill_if_exist($row["skill1"]) . display_skill_if_exist($row["skill2"]) . display_skill_if_exist($row["skill3"]) . display_skill_if_exist($row["skill4"]) . "</td>";
                            echo "<td class='actions'>
                                    <form action='./delete_eoi_action.php' method='post'>
                                        <input type='hidden' name='delete-eoi-id' value=" . $row['EOInumber'] . "/>
                                        <input type='hidden' name='Job-Reference-No' value=" . $row['job_reference_no'] . "/>
                                        <input type='hidden' name='sort-by' value=''/>
                                        <button class='delete-btn'>Delete</button>
                                    </form>
                                    <a href='./manage-detail.php?EOInumber=" . $row["EOInumber"] . "' class='edit-btn'><button>Edit</button></a>
                                  </td>
                                  </tr>";


                        }
                    } else {
                        echo "<tr><td colspan='7'>No EOIs found</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </main>
    <?php include "./footer.php" ?>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>