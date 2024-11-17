<?php
function is_leap_year($year)
{   //checking leap year
    if ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0))
        return true;
    return false;
}

function validate_date_of_birth($date_of_birth)
{
    if (trim($date_of_birth) === "")
        return false;
    $arr = [];
    preg_match_all("/\d+/", $date_of_birth, $arr);
    $year = intval($arr[0][2]);
    $month = intval($arr[0][1]);
    $day = intval($arr[0][0]);

    $current_year = date("Y");

    if (($current_year - $year) < 15 || ($current_year - $year) > 80) //checking age
        return false;

    $month_that_have_30days = [4, 6, 9, 11];
    if (in_array($month, $month_that_have_30days) && $day > 30) //check if the day is greater than 30 or not if the months are 30-day months
        return false;

    if (is_leap_year($year)) { //if it is a leap year
        if ($month == 2 && $day <= 29) { //if month is in feb, day should be less than 30
            return true;
        } else if ($month == 2 && $day > 29) { //if month is in feb,  greater than 29
            return false;
        } else {    //if other months
            return true;
        }

    }

    if ($month == 2 && $day <= 28) //if the month is in feb, it should be less than 29
        return true;
    else if ($month != 2) //if the month is not feb
        return true;
    else    //otherwise false
        return false;


}