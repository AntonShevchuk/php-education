<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Strict {

    public function test() {
        echo '<h3>OK</h3>';
    }

}

Strict::test();
