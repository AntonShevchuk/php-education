<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$directory = __DIR__ . DIRECTORY_SEPARATOR . 'logs';

if (!is_dir($directory)) {
    throw new Exception('Directory `logs` is not exists');
}

if (!is_writable($directory)) {
    throw new Exception('Directory `logs` is not writable');
}

if (!$file = @fopen($directory . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log', 'a+')) {
    throw new Exception('System can\'t open log file');
}

fputs($file, date("[H:i:s]") . " done\n");

fclose($file);
