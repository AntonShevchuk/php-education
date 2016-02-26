<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/*
include 'notfound.php'; // warning
require 'notfound.php'; // fatal error
exit();
*/
$config = require_once('config/array.php');
var_dump($config);

$config = require_once('config/array.php');
var_dump($config);

$config = require('config/array.php');
var_dump($config);
