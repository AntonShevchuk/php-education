<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

echo 'basedir: '. ini_get('open_basedir') .'<br/>';
echo 'filesize: ../phpinfo.php - '. filesize(__DIR__ .'/../phpinfo.php') . '<br/>';

ini_set('open_basedir', __DIR__);

echo 'basedir: '. ini_get('open_basedir') .'<br/>';
echo 'filesize: ../phpinfo.php - '. filesize(__DIR__ .'/../phpinfo.php') . '<br/>';
