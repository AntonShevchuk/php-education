<?php
try {
    if (random_int(0,1)) {
        throw new Exception('One');
    }
    echo 'Zero';
} catch (Exception $e) {
    echo 'Exception: ';
    echo $e->getMessage();
}
