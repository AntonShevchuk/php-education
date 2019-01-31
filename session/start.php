<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date('H:i:s');
}

echo $_SESSION['time'];
