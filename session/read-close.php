<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(
    [
        'read_and_close' => true
    ]
);

sleep(10);

echo 'Read and close session, then sleep for 10 seconds';
