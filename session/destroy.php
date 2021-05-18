<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// set lifetime of all sessions to 0 seconds
// set chance of launch the garbage collector to 100%
ini_set('session.gc_max_lifetime', 0);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);

session_start();

// clear current session data
$_SESSION = [];

// clear cookies of current user
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// completely destroy current session and all other server sessions
session_destroy();
