<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$file = $_GET['file'] ?? 'echo';

$file .= '.php';

echo "<h1>Try to include file <span>$file</span></h1>";

if (file_exists($file)) {
    include $file;
} else {
    echo '<p>File not found</p>';
}
