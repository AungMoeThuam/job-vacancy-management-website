<?php
include_once "./settings.php";

class Eoi_Controller
{
    private mysqli $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    function get_all_eoi_rows($search, $sort_by)
    {

        $sql = "";
        $search_by_all = $search;
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

        if (!is_array($search) && $search_by_all == "all") {
            $sql = "SELECT * FROM eoi ";
        } else if (!is_array($search) && $search_job_ref_no != "") {
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

    function create_eoi($new_eoi)
    {
        $job_reference_no = $new_eoi["job_reference_no"];
        $first_name = $new_eoi["first_name"];
        $last_name = $new_eoi["last_name"];
        $street = $new_eoi["street"];
        $town = $new_eoi["town"];
        $state = $new_eoi["state"];
        $postcode = $new_eoi["postcode"];
        $email = $new_eoi["email"];
        $phone = $new_eoi["phone"];
        $skill1 = $new_eoi["skill1"];
        $skill2 = $new_eoi["skill2"];
        $skill3 = $new_eoi["skill3"];
        $skill4 = $new_eoi["skill4"];
        $other_skills = $new_eoi["other_skills"];
        $date_of_birth = $new_eoi["date_of_birth"];
        $gender = $new_eoi["gender"];

        $sql = "SELECT job_reference_no FROM job_descriptions WHERE job_reference_no = '$job_reference_no'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 0)
            return false;

        $sql = "INSERT INTO eoi 
                (job_reference_no, first_name, last_name, date_of_birth, gender, street, town, state, postcode, email, phone, skill1, skill2, skill3, skill4, other_skills) 
                VALUES 
                (
                '$job_reference_no',
                '$first_name',
                '$last_name',
                '$date_of_birth',
                '$gender',
                '$street',
                '$town',
                '$state',
                '$postcode',
                '$email',
                '$phone',
                '$skill1',
                '$skill2',
                '$skill3',
               '$skill4',
               '$other_skills'
            )";
        $result = $this->db->query($sql);
        var_dump($result);
        return true;

    }

    function update_eoi($new_eoi)
    {
        $EOInumber = $new_eoi["EOInumber"];
        $job_reference_no = $new_eoi["job_reference_no"];
        $first_name = $new_eoi["first_name"];
        $last_name = $new_eoi["last_name"];
        $street = $new_eoi["street"];
        $town = $new_eoi["town"];
        $state = $new_eoi["state"];
        $postcode = $new_eoi["postcode"];
        $email = $new_eoi["email"];
        $phone = $new_eoi["phone"];
        $skill1 = $new_eoi["skill1"];
        $skill2 = $new_eoi["skill2"];
        $skill3 = $new_eoi["skill3"];
        $skill4 = $new_eoi["skill4"];
        $other_skills = $new_eoi["other_skills"];
        $date_of_birth = $new_eoi["date_of_birth"];
        $gender = $new_eoi["gender"];
        $status = $new_eoi["status"];

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

    function delete_single_eoi($eoi_id)
    {
        $sql = "DELETE FROM eoi WHERE EOInumber = '$eoi_id'";
        $this->db->query($sql);
    }

}

$eoi_controller = new Eoi_Controller($conn);