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
class Ping extends AbstractCommand
{
    /**
     * Execute
     */
    public function execute()
    {
        echo 'pong';
    }
}
