<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('zend.assertions', 1);
ini_set('assert.active', 1);
ini_set('assert.exception', 0); // just for PHP7

function backlog($script, $line, $code, $message)
{
    echo "<h3>$message</h3>";
}

assert_options(ASSERT_WARNING, false);
assert_options(ASSERT_CALLBACK, 'backlog');

/**
 * Settings format
 *
 *     [
 *         'host' => 'localhost',
 *         'port' => 3306,
 *         'name' => 'dbname',
 *         'user' => 'root',
 *         'pass' => ''
 *     ]
 *
 * @param $settings
 */
function setupDb($settings)
{
    assert(isset($settings['host']), 'Db `host` is required');
    assert(isset($settings['port']) && is_int($settings['port']), 'Db `port` is required, should be integer');
    assert(isset($settings['name']), 'Db `name` is required, should be integer');
    // connection code here
}

setupDb(['host' => 'localhost']);
