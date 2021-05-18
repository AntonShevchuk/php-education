<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// undefined variable
echo $a;

// undefined index
$b = [];
$b['a'];

// undefined constant
UNKNOWN_CONSTANT;

// array to string conversion
echo ['😈'];
