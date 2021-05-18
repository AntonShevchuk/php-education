<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// deprecated since 7
class Deprecated
{
    public function test()
    {
        // ...
    }
}

Deprecated::test();
