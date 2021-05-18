<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('OB-START: 1');
ob_start();
{
    header('PHP-VERSION: ' . PHP_VERSION);
}
ob_end_clean();
header('OB-END: 1');

echo '<h3>Open browser console and find `PHP-VERSION` header</h3>';

echo 'Output buffer level: ' . ob_get_level() . "<br/>\n";
