<?php
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

require_once 'authentication.php';

if (isset($_COOKIE[session_name()])) {
    session_start();
    $auth = new Authentication();
    $auth->logOut();
    header('Location: /display/session/auth/login');
}
