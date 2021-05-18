<?php

/**
 * @namespace
 */

namespace Education\Command;

/**
 * AbstractCommand
 *
 * @package  Education
 * @author   Anton Shevchuk
 */
abstract class AbstractCommand
{
    /**
     * @return mixed
     */
    abstract public function execute();

    /**
     * Magic __invoke
     *
     * @return mixed
     */
    public function __invoke()
    {
        return $this->execute();
    }
}
