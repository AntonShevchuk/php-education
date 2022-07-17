<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'framework.php';

$controller = include 'controller.php';
$reflection = new ReflectionFunction($controller);

function getAttributes(Reflector $reflection)
{
    $attributes = $reflection->getAttributes();
    $result = [];
    foreach ($attributes as $attribute)
    {
        $result[] = $attribute->newInstance();
    }
    return $result;
}

echo '<pre>';
var_dump(getAttributes($reflection));

