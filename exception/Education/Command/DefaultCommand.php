<?php

/**
 * @namespace
 */

namespace Education\Command;

/**
 * Ping
 *
 * @package  Education\Command
 * @author   Anton Shevchuk
 */
class DefaultCommand extends AbstractCommand
{
    /**
     * Execute
     */
    public function execute()
    {
        echo 'Default Command';
    }
}
