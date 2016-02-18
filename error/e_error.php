<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

function deep() {
    deep();
}

deep();

//$arr = array();
//
//while (true) {
//    $arr[] = str_pad(' ', 1024);
//}
