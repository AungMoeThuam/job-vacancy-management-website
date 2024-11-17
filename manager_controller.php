<?php

include_once "./settings.php";


class Manager_Controller
{

    function __construct($conn)
    {
        $this->db = $conn;
    }

    function find_manager_by_username($new_manager)
    {

        $username = $new_manager["username"];
        $sql = "SELECT username From managers WHERE username = '$username' ";
        $result = $this->db->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc()["username"];
        } else
            return false;
    }

    function find_manager($manager)
    {
        $username = $manager["username"];
        $password = $manager["password"];
        $sql = "SELECT username From managers WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc()["username"];
        } else
            return false;
    }

    function create_manager($new_manager)
    {
        $username = $new_manager["username"];
        $password = $new_manager["password"];
        $sql = "INSERT INTO managers (username,password) VALUES ('$username','$password')";
        $this->db->query($sql);


        return $username;
    }
}

$manager_controller = new Manager_Controller($conn);