<?php
error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 1 );

require_once 'DbSessionHandler.php';

/*
 * Connect to MySQL
 */
$mysqli = new mysqli('localhost', 'root', '', 'session');

/*
 * This is the "official" OO way to do it
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}


$handler = new DbSessionHandler();
session_set_save_handler($handler, true);
session_start();