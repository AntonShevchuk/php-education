<?php

require_once 'functions.php';

// session store directory
$GLOBALS['_SESS_DIR'] = __DIR__ . DIRECTORY_SEPARATOR . 'sess' . DIRECTORY_SEPARATOR;

// check writable
if (!is_writable($GLOBALS['_SESS_DIR'])) {
    die('Please check permission for directory `' . $GLOBALS['_SESS_DIR'] . '`');
}

register_shutdown_function('sess_shutdown');
