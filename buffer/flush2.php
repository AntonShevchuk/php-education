<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

while (ob_get_level()) ob_end_flush();

ob_implicit_flush();

echo "<h3>Please waiting for 10 seconds...</h3>";

for ($i = 1; $i <= 10; $i++) {
    echo "$i\n";
    sleep(1);
}

echo "<h3>Thx!</h3>";
