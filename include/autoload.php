<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// search class in current directory
function __autoload($classname) {
    $filename = "mock/". $classname .".php";
    include_once $filename;
}

// create instance
$obj = new myClass();
