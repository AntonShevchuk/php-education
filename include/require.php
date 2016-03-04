<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
include 'notfound.php'; // warning
require 'notfound.php'; // fatal error
exit();
*/

/*
$config = require_once('config/db.php');
var_dump($config);

$config = require_once('config/db.php');
var_dump($config);

$config = require('config/db.php');
var_dump($config);
*/

$res = require_once 'echo.php';
var_dump($res);

$res = require_once 'echo.php';
var_dump($res);

$res = require 'echo.php';
var_dump($res);
