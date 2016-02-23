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
    public abstract function execute();
}