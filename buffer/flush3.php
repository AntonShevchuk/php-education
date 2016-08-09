<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start(); // not needed if output_buffering is on in php.ini
ob_implicit_flush(); // implicitly calls flush() after every ob_flush()

echo "<h3>Please waiting for 10 seconds...</h3>";

for ($i = 1; $i <= 10; $i++) {
    echo "$i\n";
    ob_flush();
    sleep(1);
}

echo "<h3>Thx!</h3>";
