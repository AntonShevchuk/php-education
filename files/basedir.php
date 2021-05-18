<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h2>✅ Ok</h2>';
echo 'basedir: ' . ini_get('open_basedir') . '<br/>';
echo 'filesize: ../phpinfo.php - ' . filesize(__DIR__ . '/../phpinfo.php') . '<br/>';

ini_set('open_basedir', __DIR__);

echo '<h2>⚠️ Warning</h2>';
echo 'basedir: ' . ini_get('open_basedir') . '<br/>';
echo 'filesize: ../phpinfo.php - ' . filesize(__DIR__ . '/../phpinfo.php') . '<br/>';
