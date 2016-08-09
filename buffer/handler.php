<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function ob_handler ($buffer) {
    return "Length of string '$buffer' is ". strlen($buffer);
}

ob_start('ob_handler');
echo "hello world";
ob_end_flush();
