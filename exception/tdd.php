<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('zend.assertions', 1);
ini_set('assert.active', 1);

function backlog($script, $line, $code, $message)
{
    echo "<h3>$message</h3>";
    highlight_string($code);
}

assert_options(ASSERT_WARNING, false);
assert_options(ASSERT_CALLBACK, 'backlog');

assert('sqr(4) == 16', 'When I send integer, function should return square of it');

function sqr($a)
{
    return;
}
