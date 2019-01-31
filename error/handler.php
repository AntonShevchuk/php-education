<?php
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);

    function myHandler($level, $message, $file, $line, $context) {

        switch ($level) {
            case E_WARNING:
                $type = 'Warning';
                break;
            case E_NOTICE:
                $type = 'Notice';
                break;
            default;
                return false;
        }
        echo "<h2>$type: $message</h2>";
        echo "<p><strong>File</strong>: $file:$line</p>";
        echo "<p><strong>Context</strong>: $". implode(', $', array_keys($context))."</p>";
        return true;
    }

    set_error_handler('myHandler', E_ALL);

// generate E_NOTICE error
echo $a;

// generate E_WARNING error
implode('string', 'string');

// generate E_USER_DEPRECATED
trigger_error('Deprecated error', E_USER_DEPRECATED);
