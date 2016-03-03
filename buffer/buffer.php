<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// echo str_pad(' ', 4096); // for fill PHP output buffer

ob_start();
{
    echo "<h1>Hello world!</h1>";
    require dirname(__DIR__) . '/include/template/list.php';
    session_start();
    $content = ob_get_contents();
}
ob_end_clean();

echo $content;
