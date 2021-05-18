<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$buffer = ini_get('output_buffering') ?: 1;

echo str_pad('', $buffer - 1);

header('TAG-A: ' . PHP_VERSION);

echo ' ';

header('TAG-B: ' . PHP_VERSION);

echo '<h3>Open browser console and try to find `TAG-A` and `TAG-B` headers</h3>';

echo 'Output buffer level: ' . ob_get_level() . "<br/>\n";
echo 'Output buffering value: ' . $buffer . "<br/>\n";
