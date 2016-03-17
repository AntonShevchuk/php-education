<?php
try {
    if (rand(0,1)) {
        throw new Exception("One");
    } else {
        echo "Zero";
    }
} catch (Exception $e) {
    echo "Exception: ";
    echo $e->getMessage();
}
