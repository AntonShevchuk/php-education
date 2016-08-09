<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_implicit_flush(false);
ob_start();

echo "hello world";
$content = ob_get_flush();
var_dump($content);
