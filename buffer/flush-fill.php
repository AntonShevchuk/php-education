<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get output buffering size
$buffer = ini_get('output_buffering');

echo '<h3>Please waiting for 10 seconds...</h3>';

for ($i = 1; $i <= 10; $i++) {
    echo str_pad($i, $buffer); // fill buffer with space symbols
    flush(); // send string to browser
    sleep(1);
}

echo '<h3>Thx!</h3>';
