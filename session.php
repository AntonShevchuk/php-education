<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

session_start();

$_SESSION['integer var'] = 123;
$_SESSION['float var'] = 1.23;
$_SESSION['octal var'] = 0x123;
$_SESSION['string var'] = "Hello world";
$_SESSION['array var'] = array('one', 'two', [1,2,3]);

$object = new stdClass();
$object->foo = 'bar';
$object->arr = array('hello', 'world');
$_SESSION['object var'] = $object;
$_SESSION['integer again'] = 42;

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

$name = ini_get('session.name');

$file = isset($_COOKIE[$name])?$_COOKIE[$name]:null;

if ($file) {
    $path = ini_get('session.save_path');
    $data = file_get_contents($path.'/sess_'.$file);
    echo '<hr/>';
    echo '<pre>';
    var_dump($data);
    echo '</pre>';


    $arr = preg_split('/\|/',$data);
    echo '<pre>';
    var_dump($arr);

    $session_value = array();
    $session_key = array();
    $session_key[] = array_shift($arr);
    $session_value[sizeof($arr)-1] = array_pop($arr);

    for ($i=0;$i<count($arr);$i++){
        if (strpos($arr[$i],'i:') === 0 || strpos($arr[$i],'d:') === 0 ) {
            $mass = explode(';', $arr[$i], 2);
            $session_key[] = $mass[1];
            $session_value[$i] = $mass[0] . ';';
        } elseif (strpos($arr[$i],'s:') === 0) {
            $mass = explode(':', $arr[$i], 3);
            $length = (int) $mass[1];
            $session_key[] = substr($mass[2], $length+3);
            $session_value[$i] = 's:'.$length.':'.substr($mass[2], 0, $length+3);
        } elseif (strpos($arr[$i],'a:') === 0 || strpos($arr[$i],'O:') === 0 ) {
            $lastChar = strrpos($arr[$i], '}')+1;
            $session_key[] = substr($arr[$i], $lastChar);
            $session_value[$i] = substr($arr[$i], 0, $lastChar);
        }
    }
    ksort($session_value);

    var_dump($session_value);
    var_dump($session_key);

    $result = array_combine($session_key, $session_value);
    $result = array_map('unserialize', $result);
    var_dump($result);
}
