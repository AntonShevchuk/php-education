<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $header = template('header', ['title' => 'Hello World!']);
    $content = template('content', ['content' => 'Lorem ipsum...', 'meta' => 'Author info']);
    $footer = template('footer', ['copy' => 'Copyright ' . date('Y')]);
    // ...some skipped logic
} catch (InvalidArgumentException $e) {
    // ...display errors
}

echo $header, $content, $footer;

/**
 * @param string $template
 * @param array $vars
 * @return string
 * @throws InvalidArgumentException
 */
function template($template, $vars)
{
    ob_start();
    if (in_array('template', $vars, true)) {
        throw new InvalidArgumentException('Variable name `template` is reserved');
    }
    extract($vars);
    include "template/$template.phtml";
    return ob_get_clean();
}
