<?php

/**
 * @namespace
 */

namespace Education;

/**
 * Front
 *
 * @package  Education
 * @author   Anton Shevchuk
 */
class Front
{
    public static function main()
    {
        try {
            $helper = new RequestHelper(array('cmd' => null));
            $helper->runCommand();
        } catch (\Exception $e) {
            echo "<h1>" . get_class($e) . "</h1>\n";
            echo "<h2>" . $e->getMessage() . ", code " . $e->getCode() . "</h2>\n\n";
            echo "file: " . $e->getFile() . "<br />\n";
            echo "line: " . $e->getLine() . "<br />\n";
            echo '<pre>';
            echo $e->getTraceAsString();
            echo '</pre>';
            die;
        }
    }
}
