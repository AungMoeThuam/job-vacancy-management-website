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
    if (trim($date_of_birth) === "")
        return false;
    echo "passed empty<br>";
    $arr = [];
    preg_match_all("/\d+/", $date_of_birth, $arr);
    var_dump($arr[0]);
    echo "<br>";
    $year = intval($arr[0][2]);
    $month = intval($arr[0][1]);
    $day = intval($arr[0][0]);

    $current_year = date("Y");

    if (($current_year - $year) < 15 || ($current_year - $year) > 80)
        return false;
    echo "passed age<br>";
    if (is_leap_year($year)) {
        if ($month == 2 && $day <= 29) {
            echo "passed feb in leap year<br>";

            return true;
        }
        echo "not passed feb in leap year<br>";

        return false;

    } elseif ($month == 2 && $day <= 28) {

        echo "passed feb in not leap year<br>";
        return true;
    }
    echo "not passed feb in leap year<br>";

    return true;


}