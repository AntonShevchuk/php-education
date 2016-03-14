<?php
set_exception_handler(function($exception) {
    var_dump($exception);
});

throw new Exception('Try man!');

echo '<h3>OK</h3>';
