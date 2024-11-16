<?php
function to_array($string)
{
    $array = explode(".", trim($string));
    foreach ($array as $key => $value) {
        $value .= ".";
    }

    $empty_string_index = array_search("", $array);
    array_splice($array, $empty_string_index, 1);


    return $array;

}