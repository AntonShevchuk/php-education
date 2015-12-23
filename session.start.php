<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

session_start();

echo $_SESSION['id'];
$_SESSION['id'] = 42;
