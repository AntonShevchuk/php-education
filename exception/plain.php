<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// load all files w/out autoloader
require_once 'Education/Command/AbstractCommand.php';
require_once 'Education/CommandManager.php';
require_once 'Education/Exception/EducationException.php';
require_once 'Education/Exception/CommandManagerException.php';
require_once 'Education/Exception/IllegalCommandException.php';
require_once 'Education/RequestHelper.php';

use Education\CommandManager;
use Education\RequestHelper;
use Education\Exception\EducationException;
use Education\Exception\CommandManagerException;
use Education\Exception\IllegalCommandException;

try {
    $helper = new RequestHelper();
    $helper->runCommand();
} catch (\Exception $e) {
    echo get_class($e) . '</br>';
    echo $e->getMessage() . '<br/>';
    if ($e = $e->getPrevious()) {
        echo '<hr/>';
        echo get_class($e) . '</br>';
        echo $e->getMessage() . '<br/>';
    }
    echo 'Try "ping" command: <a href="/exception/plain.php?cmd=ping">/exception/plain.php?cmd=ping</a>';
    exit();
}
