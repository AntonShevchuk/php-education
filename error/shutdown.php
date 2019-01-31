<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function shutdown() {
    $error = error_get_last();
    if (
        // has error
        is_array($error) &&
        // fatal error has occurred
        in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], false)
    ) {
        while (ob_get_level()) {
            ob_end_clean();
        }
        include dirname(__DIR__) .'/template/header.php';
        echo '<div class="container">';
        echo '<h1>Sorry, we found error in your code</h1>';
        echo "<pre>";
        var_dump($error);
        echo "</pre>";
        echo "</div>";
        include dirname(__DIR__) .'/template/footer.php';
    }
}

register_shutdown_function('shutdown');

require_once 'e_parse.php';
