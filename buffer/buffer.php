<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// disable output buffering
if (ini_get('output_buffering')) {
    while (ob_get_level()) ob_end_flush();
}

// start
ob_start();
{
    echo '<h1>Hello world!</h1>';
    require dirname(__DIR__) . '/include/template/list.php';
    session_start();
    $content = ob_get_contents();
}
ob_end_clean();
// end

echo $content;
