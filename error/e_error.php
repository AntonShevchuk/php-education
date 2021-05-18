<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// nesting level
/*
function deep() {
    deep();
}
deep();
*/

// allowed memory size
/*
$arr = [];
while (true) {
    $arr[] = str_pad(' ', 1024);
}
*/

// uncaught exception
/*
throw new Exception();
*/

// undefined method
/*
$stdClass = new stdClass();
$stdClass->notExists();
*/

// undefined function
the_roof_is_on_fire();

// failed opening required
/*
require_once 'not-exists.php';
*/
