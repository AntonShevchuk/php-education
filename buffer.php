<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// echo str_pad(' ', 4096); // for fill PHP output buffer

ob_start();
{
    echo "hello world";
    require 'list.php';
    session_start();
    $content = ob_get_contents();
}
ob_end_clean();

for ($i = 0; $i <10; $i++) {
    echo $content;
    echo str_pad(' ', 4096);
    flush();
    sleep(1);
}