<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$header = template('header', ['title' => 'Hello World!']);
$content = template('content', ['content' => "Lorem ipsum...", 'meta' => 'Author info']);
$footer = template('footer', ['copy' => "Copyright ". date('Y')]);
// ...some skipped logic

echo $header, $content, $footer;

/**
 * @param  string $template
 * @param  array $vars
 * @return string
 * @throws Exception
 */
function template($template, $vars) {
    ob_start();
    if (in_array('template', $vars)) {
        throw new Exception("Variable name `template` is reserved");
    }
    extract($vars);
    include "template/$template.phtml";
    return ob_get_clean();
}
