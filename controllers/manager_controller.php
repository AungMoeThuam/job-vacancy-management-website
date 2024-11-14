<?php
include_once "../settings.php";
class Manager_controller
{
    function __construct($conn)
    {
        $this->db = $conn;
    }

    function find_manager($manager)
    {
        $email = $manager["email"];
        $password = $manager["password"];
        $sql = "SELECT id From managers WHERE email = '$email' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc()["id"];
        } else
            return false;
    }
}

$manager_controller = new Manager_controller($conn);