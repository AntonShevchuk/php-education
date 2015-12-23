<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

require_once 'include/sess.php';

sess_start();

echo $_SESS["id"];
$_SESS["id"] = 42;
