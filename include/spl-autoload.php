<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// search class in current directory
function myAutoload($classname) {
    $filename = "mock/". $classname .".php";
    include_once $filename;
}

spl_autoload_register('myAutoload');

// create instance
$obj = new myClass();
