<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/*
include 'notfound.php'; // warning
require 'notfound.php'; // fatal error
exit();
*/
echo '<pre>';
$config = require_once('config.php');
echo "\$config = require_once('config.php')";
var_dump($config);
echo '<hr/>';
$config = require_once('config.php');
echo "\$config = require_once('config.php')";
var_dump($config);
echo '<hr/>';
$config = require('config.php');
echo "\$config = require('config.php')";
var_dump($config);
echo '<hr/>';
echo '</pre>';

echo '<ol>';
for ($i = 0; $i < 10; $i++) {
    include_once 'require.template.php';
}
echo '</ol>';
echo '<hr/>';
echo '<ol>';
for ($i = 0; $i < 10; $i++) {
    include 'require.template.php';
}
echo '</ol>';
