<?php
/**
 * Routing file
 * Need for correct start build-in web-server
 * @link http://php.net/manual/en/features.commandline.webserver.php
 */
if (preg_match('/^\/display\/(?P<display>.*)/', $_SERVER['REQUEST_URI'], $match)) {
    $match['display'];
    if (file_exists(__DIR__ .'/'. $match['display'] . '.php')) {
        $_GET['file'] = $match['display'];
        include_once 'display.php';
    } else {
        return false;
    }
} elseif (file_exists(__DIR__ . $_SERVER['SCRIPT_NAME'])) {
    return false; // serve the requested resource as-is.
} else {
    include_once 'index.php';
}
