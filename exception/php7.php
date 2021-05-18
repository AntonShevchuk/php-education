<?php

/**
 * Error handling in PHP7
 */

try {
    include 'e_parse_include.php';
} catch (ParseError $e) {
    echo '<h2>Parse Error</h2>';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

try {
    (function (int $one, int $two) {
        return;
    })(
        'one',
        'two'
    );
} catch (TypeError $e) {
    echo '<h2>Type Error</h2>';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

try {
    1 << -1;
} catch (ArithmeticError $e) {
    echo '<h2>Arithmetic Error</h2>';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

try {
    1 % 0;
} catch (DivisionByZeroError $e) {
    echo '<h2>Division By Zero Error</h2>';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

ini_set('zend.assertions', 1);
ini_set('assert.exception', 1);

try {
    assert(1 === 0);
} catch (AssertionError $e) {
    echo '<h2>Assertion Error</h2>';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}
