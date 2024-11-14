<?php

function get_file_path($url)
{
    return $_SERVER['DOCUMENT_ROOT'] . $url;
}