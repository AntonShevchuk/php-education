<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

require_once 'include/sess.php';

sess_start();

if (isset($_SESS["id"])) {
    echo $_SESS["id"];
} else {
    $_SESS["id"] = 42;
}
