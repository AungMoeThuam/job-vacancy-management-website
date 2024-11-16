<?php

class Error_controller
{

    function show_error()
    {
        if ($_SESSION["errors"]) {
            foreach ($_SESSION["errors"] as $key => $value) {
                echo "<p class='error'>" . $value . "</p>";
            }
        }
    }

    function get_error($key)
    {
        if ($_SESSION["errors"] !== null && isset($_SESSION["errors"][$key]))
            return $_SESSION["errors"][$key];

        return false;

    }

    function set_error($key, $message)
    {
        $_SESSION["errors"][$key] = $message;

    }

    function clear_all_errors()
    {
        echo "clear";
        foreach ($_SESSION["errors"] as $key => $value) {
            $_SESSION["errors"][$key] = null;
        }
    }

    function display_error($key)
    {
        $error_message = $this->get_error($key);
        if ($error_message)
            echo "<p class='error-message'>" . $error_message . "</p>";


    }
}
$error_controller = new Error_controller();