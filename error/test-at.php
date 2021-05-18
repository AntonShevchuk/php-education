<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
#
# First
#
$memStart = memory_get_usage();
$timeStart = microtime(true);

$a = '';
$arr = [];
for ($i = 0; $i < 10000; $i++) {
    $arr[$a] = $i;
}

$memEnd = memory_get_usage();
$timeEnd = microtime(true);

$firstTime = $timeEnd - $timeStart;
$firstMemory = $memEnd - $memStart;

unset($a, $arr, $i);

echo '<h3>first run</h3>';
echo '<pre>';
printf('%f seconds <br/>', $firstTime);
echo number_format($firstMemory, 0, '.', ' '), ' bytes<br/>';
echo '</pre>';

#
# Second
#
$memStart = memory_get_usage();
$timeStart = microtime(true);

$agg = [];
for ($j = 0; $j < 10000; $j++) {
    @$agg[$b] = $j;
}

$memEnd = memory_get_usage();
$timeEnd = microtime(true);

$secondTime = $timeEnd - $timeStart;
$secondMemory = $memEnd - $memStart;

echo '<h3>second run</h3>';
echo '<pre>';
printf('%f seconds <br/>', $secondTime);
echo number_format($secondMemory, 0, '.', ' '), ' bytes<br/>';
echo '</pre>';

#
# Diff
#
echo '<h3>diff</h3>';
echo '<pre>';
printf('%f seconds <br/>', $secondTime - $firstTime);
echo number_format($secondMemory - $firstMemory, 0, '.', ' '), ' bytes<br/>';
echo '</pre>';
printf('<strong>%d</strong> times slower <br/>', $secondTime / $firstTime);
