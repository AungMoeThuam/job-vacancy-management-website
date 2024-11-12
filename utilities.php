<?php
function is_leap_year($year)
{
    #if the year is divisibly by 4
    if ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0))
        return true;
    return false;
}

function validate_date_of_birth($date_of_birth)
{
    $arr = [];
    preg_match_all("/\d+/", $date_of_birth, $arr);

    $year = intval($arr[0][2]);
    $month = intval($arr[0][1]);
    $day = intval($arr[0][0]);

    $current_year = date("Y");

    if (($current_year - $year) < 15 || ($current_year - $year) > 80)
        return false;

    if (is_leap_year($year)) {
        if ($month == 2 && $day <= 29)
            return true;
        return false;

    } else {
        if ($month == 2 && $day <= 28)
            return true;
        return false;
    }





}

validate_date_of_birth("30/02/2032");