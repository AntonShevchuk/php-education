<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('open_basedir', __DIR__);

echo '<h2>✅ OK</h2>';
include 'echo.php';

echo '<h2>⚠️ Warning</h2>';
include '../phpinfo.php';
