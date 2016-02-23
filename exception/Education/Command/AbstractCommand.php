<?php
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
    public abstract function execute();

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