<?php

function example()
{
    echo '<pre>';
    debug_print_backtrace();
    echo '</pre>';
}

class ExampleClass
{
    public static function method()
    {
        example();
    }
}

ExampleClass::method();
