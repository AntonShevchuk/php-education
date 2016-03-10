<?php
/**
 * Этот код не вызывает ошибок
 */

// сохраняем параметры памяти и времени выполнения скрипта
$memory = memory_get_usage();
$time= microtime(true);

$a = '';
$arr = [];
for ($i = 0; $i < 10000; $i++) {
    $arr[$a] = $i;
}

printf('%f seconds <br/>', microtime(true) - $time);
echo number_format(memory_get_usage() - $memory, 0, '.', ' '), ' bytes<br/>';
