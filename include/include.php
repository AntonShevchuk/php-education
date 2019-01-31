<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . 'math');

function a() {
    include 'variable.php';  // $a = 0;   = 0
    include 'increment.php'; // $a++;     = 1
    include 'increment.php'; // $a++;     = 2
    include 'multiple.php';  // $a <<= 2; = 8
    include 'decrement.php'; // $a--      = 7
    include 'decrement.php'; // $a--      = 6
    include 'pow.php';       // $a **= 2; = 36
    include 'echo.php';      // 36
}

a();
