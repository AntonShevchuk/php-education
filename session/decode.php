<?php
include_once dirname(__DIR__) . '/include/dump.php';

session_start();

// Setup session data
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

$sessionId = session_id();

echo '<h2>Session ID: <span>'.$sessionId.'</span></h2>';
echo '<h2>Session data</h2>';

dump($_SESSION);

// save session data and close session
session_write_close();

if ($sessionId) {
    // get content of session file
    $path = ini_get('session.save_path');
    if (empty($path)) {
        $path = sys_get_temp_dir();
    }
    $data = file_get_contents($path.'/sess_'.$sessionId);

    echo '<h2>File content</h2>';
    dump($data);

    echo '<h2>Split by pipe for receive session variables</h2>';
    $arr = preg_split('/\|/',$data);
    dump($arr);

    $session_value = array();
    $session_key = array();
    $session_key[] = array_shift($arr);
    $session_value[sizeof($arr)-1] = array_pop($arr);

    for ($i=0; $i<count($arr); $i++){
        if (strpos($arr[$i],'i:') === 0 || strpos($arr[$i],'d:') === 0 ) {
            // process integer and double
            $mass = explode(';', $arr[$i], 2);
            $session_key[] = $mass[1];
            $session_value[$i] = $mass[0] . ';';
        } elseif (strpos($arr[$i],'s:') === 0) {
            // process string
            $mass = explode(':', $arr[$i], 3);
            $length = (int) $mass[1];
            $session_key[] = substr($mass[2], $length+3);
            $session_value[$i] = 's:'.$length.':'.substr($mass[2], 0, $length+3);
        } elseif (strpos($arr[$i],'a:') === 0 || strpos($arr[$i],'O:') === 0 ) {
            // process array and objects
            $lastChar = strrpos($arr[$i], '}')+1;
            $session_key[] = substr($arr[$i], $lastChar);
            $session_value[$i] = substr($arr[$i], 0, $lastChar);
        }
    }
    ksort($session_value);

    echo '<h2>Keys</h2>';
    dump($session_key);
    echo '<h2>Values</h2>';
    dump($session_value);

    $result = array_combine($session_key, $session_value);
    $result = array_map('unserialize', $result);
    echo '<h2>Result</h2>';
    dump($result);
}
