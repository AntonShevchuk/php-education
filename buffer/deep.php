<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo ob_get_level();              // 1
ob_start();
    echo ob_get_level();          // 2
    ob_start();
        echo ob_get_level();      // 3
        ob_start();
            echo ob_get_level();  // 4
        ob_end_flush();
    ob_end_flush();
ob_end_flush();


echo '<pre>';
print_r(ob_get_status(true));
echo '</pre>';
