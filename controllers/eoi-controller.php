<?php
include_once "./settings.php";

class Eoi_Controller
{
    function __construct($conn)
    {
        $this->db = $conn;
    }
    function get_all_eoi_rows($search, $sort_by)
    {

        $sql = "";
        $search_job_ref_no = $search;
        $search_first_name = $search[0];
        $search_last_name = $search[1];
        $orderBy = "ORDER BY EOInumber";
        if ($sort_by === 'First-Name') {
            $orderBy = "ORDER BY first_name";
        } elseif ($sort_by === 'Last-Name') {
            $orderBy = "ORDER BY last_name";
        } elseif ($sort_by === 'both') {
            $orderBy = "ORDER BY first_name, last_name";
        } else {
            $orderBy = "ORDER BY EOInumber"; // Default sorting
        }

        if (!is_array($search) && $search_job_ref_no != "") {
            $sql = "SELECT * FROM eoi WHERE job_reference_no = '$search_job_ref_no' $orderBy ";
        } else {
            $sql = "SELECT * FROM eoi WHERE first_name = '$search_first_name' OR last_name = '$search_last_name' $orderBy ";

        }

        $result = $this->db->query($sql);

        return $result;

    }

    function get_single_eoi_row($EOInumber)
    {
        $sql = "SELECT * FROM eoi WHERE EOInumber = '$EOInumber' ";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    function update_eoi($new_eoi)
    {
        // Escape special characters to prevent SQL injection
        $EOInumber = htmlspecialchars($new_eoi['EOInumber']);
        $first_name = htmlspecialchars($new_eoi['first_name']);
        $last_name = htmlspecialchars($new_eoi['last_name']);
        $street = htmlspecialchars($new_eoi['street']);
        $town = htmlspecialchars($new_eoi['town']);
        $state = htmlspecialchars($new_eoi['state']);
        $postcode = htmlspecialchars($new_eoi['postcode']);
        $email = htmlspecialchars($new_eoi['email']);
        $phone = htmlspecialchars($new_eoi['phone']);
        $skill1 = htmlspecialchars($new_eoi['skill1']);
        $skill2 = htmlspecialchars($new_eoi['skill2']);
        $skill3 = htmlspecialchars($new_eoi['skill3']);
        $skill4 = htmlspecialchars($new_eoi['skill4']);
        $other_skills = htmlspecialchars($new_eoi['other_skills']);
        $status = htmlspecialchars($new_eoi['status']);
        $date_of_birth = htmlspecialchars($new_eoi['date_of_birth']);
        $gender = htmlspecialchars($new_eoi['gender']);
        $job_reference_no = htmlspecialchars($new_eoi['job_reference_no']);

        // Construct the SQL query
        $sql = "UPDATE eoi SET 
            job_reference_no = '$job_reference_no',
            first_name = '$first_name',
            last_name = '$last_name',
            street = '$street',
            town = '$town',
            state = '$state',
            postcode = '$postcode',
            email = '$email',
            phone = '$phone',
            skill1 = '$skill1',
            skill2 = '$skill2',
            skill3 = '$skill3',
            skill4 = '$skill4',
            other_skills = " . ($other_skills ? "'$other_skills'" : "NULL") . ",
            status = '$status',
            date_of_birth = '$date_of_birth',
            gender = '$gender'
            WHERE EOInumber = '$EOInumber'";

        return $this->db->query($sql);
    }
}

$eoi_controller = new Eoi_Controller($conn);