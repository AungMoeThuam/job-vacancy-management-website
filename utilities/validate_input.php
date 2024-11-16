<?php

include_once "./controllers/error_controller.php";
include_once "./utilities/validate_date.php";

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}


function validate_form($form)
{
    $gender = isset($form["gender"]) ? sanitize_input($form["gender"]) : false;
    $other = isset($form["other"]) ? sanitize_input($form["other"]) : false;
    $other_skills = isset($form["other_skills"]) ? sanitize_input($form["other_skills"]) : false;
    $state = isset($form["state"]) ? sanitize_input($form["state"]) : false;
    $skill1 = isset($_POST["skills"][0]) ? sanitize_input($_POST["skills"][0]) : "0";
    $skill2 = isset($_POST["skills"][1]) ? sanitize_input($_POST["skills"][1]) : "0";
    $skill3 = isset($_POST["skills"][2]) ? sanitize_input($_POST["skills"][2]) : "0";
    $skill4 = isset($_POST["skills"][3]) ? sanitize_input($_POST["skills"][3]) : "0";
    unset($form["gender"]);
    unset($form["other"]);
    unset($form["other_skills"]);
    unset($form["skills"]);
    unset($form["state"]);

    $validation_rules = [
        "first_name" => "/^[a-zA-Z ]{1,20}$/",
        "last_name" => "/^[a-zA-Z ]{1,20}$/",
        "postcode" => "/^[0-9]{4}$/",
        "job_reference_no" => "/^[a-zA-Z0-9]{5}$/",
        'date_of_birth' => '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/',
        'town' => '/^.{1,40}$/',
        'street' => '/^.{1,40}$/',
        'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'phone' => '/^\d{1,3}(?:\s?\d){7,11}$/',
    ];
    $errors = [];
    if (preg_match($validation_rules["date_of_birth"], $form["date_of_birth"])) {
        echo "passed first<br>";
        if (validate_date_of_birth($form["date_of_birth"]) === false)
            $errors["date_of_birth"] = false;
    } else {
        $errors["date_of_birth"] = false;

    }
    foreach ($form as $key => $value) {
        if ($key === "date_of_birth")
            continue;

        if (!preg_match($validation_rules[$key], $form[$key]))

            $errors[$key] = false;



    }

    var_dump($errors);

    return true;

}