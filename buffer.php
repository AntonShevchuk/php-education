<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

ob_start();
echo "hello world";
session_start();
$content = ob_get_contents();
ob_end_clean();

echo $content;
