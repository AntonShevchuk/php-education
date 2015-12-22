<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

echo "<h3>Please waiting fot 10 seconds...</h3>";

for ($i = 1; $i <= 10; $i++) {
    echo str_pad($i, 4096);
    flush();
    sleep(1);
}

echo "<h3>Thx!</h3>";
