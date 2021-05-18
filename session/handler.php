<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Education/DbSessionHandler.php';

/*
 * Connect to MySQL
 */
$mysqli = new mysqli('localhost', 'root', '', 'session');

/*
 * This is the "official" OO way to do it
 */
if ($mysqli->connect_error) {
    die(
        'Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error
    );
}


$handler = new Education\DbSessionHandler();
session_set_save_handler($handler, true);
session_start();
