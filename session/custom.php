<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'sess.php';

sess_start();

if (isset($_SESS["id"])) {
    echo $_SESS["id"];
} else {
    $_SESS["id"] = 42;
}

// reload page
