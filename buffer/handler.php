<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * @param  string  $buffer
 * @param  integer $phase
 * @return string
 */
function ob_handler ($buffer, $phase) {
    return
        "Phase value: ". decbin($phase) . "<br/>\n" .
        "Is it start phase: " . (($phase & PHP_OUTPUT_HANDLER_START)?"true":"false") . "<br/>\n" .
        "Is it final phase: " . (($phase & PHP_OUTPUT_HANDLER_FINAL)?"true":"false") . "<br/>\n" .
        "Length of string '$buffer' is ". strlen($buffer);
}

ob_start('ob_handler');
echo 'hello world';
ob_get_flush();
