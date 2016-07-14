<?php
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

require_once 'authentication.php';

// check the existence of session and resume it
if (isset($_COOKIE[session_name()])) {
    session_start();
}

$auth = new Authentication();
if (isset($_POST['login']) && isset($_POST['pass'])) {
    // login user
    $auth->auth($_POST['login'], $_POST['pass']);
}

require_once('auth-view.phtml');
