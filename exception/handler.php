<?php
set_exception_handler(function($exception) {
    /** @var Exception $exception */
    echo $exception->getMessage(), "<br/>\n";
    echo $exception->getFile(), ':', $exception->getLine(), "<br/>\n";
    echo $exception->getTraceAsString(), "<br/>\n";
});

throw new Exception('Try man!');

echo '<h3>OK</h3>';
