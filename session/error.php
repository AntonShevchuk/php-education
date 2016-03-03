<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// for fill PHP output buffer
echo str_pad(' ', ini_get('output_buffering'));

session_start();
