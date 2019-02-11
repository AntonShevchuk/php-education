<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('open_basedir', __DIR__);

include 'echo.php'; // OK

include '../phpinfo.php'; // WARNING
