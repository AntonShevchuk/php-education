<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/**
 * Dump data to screen
 */
function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}
 
