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
require_once 'Education/Front.php';

use Education\Front;

Front::main();
