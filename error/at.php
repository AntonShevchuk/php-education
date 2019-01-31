<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function myHandler($level, $message) {
    if (error_reporting()) {
        echo "<h2>$message</h2>";
        return true;
    } else {
        echo '<h2>At @ detected</h2>';
        return true;
    }
}

set_error_handler('myHandler', E_ALL);

UNKNOWN_CONSTANT;

@UNKNOWN_CONSTANT;
