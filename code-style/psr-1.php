<?php

/**
 * PSR-1 code style
 * @link https://www.php-fig.org/psr/psr-1/
 */

$max = 15;
for ($i = 1; $i <= $max; $i++) {
    echo $i;
    if ($i % 3 === 0 && $i % 5 === 0) {
        echo ' divided by three and five';
    } elseif ($i % 3 === 0) {
        echo ' divided by three';
    } elseif ($i % 5 === 0) {
        echo ' divided by five';
    }
    echo '<br/>';
}
