<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();

echo "hello";
$a = ob_get_contents();
ob_clean();

echo "world";
$b = ob_get_contents();
ob_end_clean();

echo $a .' '. $b;
