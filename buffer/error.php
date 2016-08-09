<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$buffer = ini_get('output_buffering') ?: 1;

echo str_pad('', $buffer, ' ');

header("PHP-VERSION: ". PHP_VERSION);

echo '<h3>Open browser console and try to find `PHP-VERSION` header</h3>';

echo 'Output buffer level: ' . ob_get_level() . "<br/>\n";
echo 'Output buffering: ' . $buffer . "<br/>\n";
