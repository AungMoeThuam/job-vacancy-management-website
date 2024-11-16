<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/settings.php";

class Job_Description_Controller
{
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function get_all_job_rows()
    {

        $sql = "SELECT * FROM job_descriptions";
        $result = $this->db->query($sql);
        return $result;

    }

    function get_single_job_row($job_reference_no)
    {
        $sql = "SELECT * FROM job_descriptions WHERE job_reference_no = '$job_reference_no'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }


}

$job_description_controller = new Job_Description_Controller($conn);