<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

session_write_close();

sleep(10);

echo 'Close session, and sleep for 10 seconds';
