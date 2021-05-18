<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__));

echo '<pre>';
var_dump(preg_split('/[' . PATH_SEPARATOR . ']/', get_include_path()));
echo '</pre>';

// include_path ignored
// file not found
include './template/list.php';
