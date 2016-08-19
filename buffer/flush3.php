<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// disable output buffering
if (ini_get('output_buffering')) {
    ob_end_flush();
}

ob_implicit_flush(); // implicitly calls flush() after every output or ob_flush() call

echo "<h3>Please waiting for 10 seconds...</h3>";

ob_start();

for ($i = 1; $i <= 10; $i++) {
    echo $i . "<br/>\n";
    ob_flush(); // send string to browser
    sleep(1);
}

echo "<h3>Thx!</h3>";
