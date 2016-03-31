<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$buffer = ini_get('output_buffering');

echo str_pad('', $buffer - 1, ' #');

header("PHP-VERSION: ". PHP_VERSION);

echo '<h3>Open browser console and find `PHP-VERSION` header</h3>';

echo 'Output buffer level:' . ob_get_level();
