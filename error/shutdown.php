<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

function shutdown() {
    $error = error_get_last();
    if (
        is_array($error) &&
        in_array($error['type'], array(E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR))) {
        // fatal error has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        include dirname(__DIR__) .'/include/header.php';
        echo '<div class="container">';
        echo '<h1>Sorry, we found error in your code</h1>';
        echo "<pre>";
        var_dump($error);
        echo "</pre>";
        echo "</div>";
        include dirname(__DIR__) .'/include/footer.php';
    }
}

register_shutdown_function('shutdown');

require_once 'e_parse.php';
