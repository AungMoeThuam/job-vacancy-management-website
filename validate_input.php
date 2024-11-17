<?php

include_once "./error_controller.php";
include_once "./validate_date.php";

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}


function validate_form($form)
{
    $form["gender"] = isset($form["gender"]) ? sanitize_input($form["gender"]) : false;
    $form["other"] = isset($form["other"]) ? sanitize_input($form["other"]) : false;
    $form["other_skills"] = isset($form["other_skills"]) ? sanitize_input($form["other_skills"]) : false;
    $form["state"] = isset($form["state"]) ? sanitize_input($form["state"]) : false;
    $form["skills"] = isset($form["skills"]) ? $form["skills"] : false;
    $form["skill1"] = isset($form["skills"][0]) ? sanitize_input($form["skills"][0]) : "0";
    $form["skill2"] = isset($form["skills"][1]) ? sanitize_input($form["skills"][1]) : "0";
    $form["skill3"] = isset($form["skills"][2]) ? sanitize_input($form["skills"][2]) : "0";
    $form["skill4"] = isset($form["skills"][3]) ? sanitize_input($form["skills"][3]) : "0";


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
    $error_messages = [
        "first_name" => "First name cannot be empty and it can have maximum 20 characters.",
        "last_name" => "Last name cannot be empty and it can have maximum 20 characters.",
        "postcode" => "Postcode cannot be empty and it should be exactly 4 digits.",
        "job_reference_no" => "Job Reference No should be exactly 5 alphanumeric characters.",
        'date_of_birth' => 'Birthday should follow valid and dd/mm/yyyy format and at least 18 years old and not greater than 80 years old.',
        'town' => 'Town cannot be empty and it can have max 40 characters',
        'street' => 'Street cannot be empty and it can have max 40 characters',
        'email' => 'Email should be a valid email format.',
        'phone' => 'Phone can have 8 to 12 digits, and contain spaces',
        'state' => 'State cannot be empty and required to choose 1 state.',
        'gender' => 'Gender cannot be empty and required to choose 1 gender.',
        'skills' => 'Skills cannot be empty and required to choose at least 1.',
        'other_skills' => 'if other checkbox is selected then required to list other skills in textarea.',
    ];


    $errors = [];

    if (preg_match($validation_rules["date_of_birth"], $form["date_of_birth"])) {
        if (validate_date_of_birth($form["date_of_birth"]) === false)
            $errors["date_of_birth"] = $error_messages["date_of_birth"];
    } else {
        $errors["date_of_birth"] = $error_messages["date_of_birth"];

    }

    foreach ($form as $key => $value) {
        if ($key === "date_of_birth")
            continue;
        if (!array_key_exists($key, $validation_rules))
            continue;
        if (!preg_match($validation_rules[$key], $form[$key]))

            $errors[$key] = $error_messages[$key];

    }

    if (!$form["gender"])
        $errors["gender"] = $error_messages["gender"];
    if (!$form["state"])
        $errors["state"] = $error_messages["state"];
    if (!$form["skills"])
        $errors["skills"] = $error_messages["skills"];
    if ($form["other"] && !$form["other_skills"])
        $errors["other_skills"] = $error_messages["other_skills"];



    if (count($errors) !== 0)
        return [false, $errors];
    else
        return [true, $form];


}