<?php

/**
 * @namespace
 */

namespace Education;

use Education\Command;
use Education\Exception\CommandManagerException;
use Education\Exception\IllegalCommandException;

/**
 * CommandManager
 *
 * @package  Education
 * @author   Anton Shevchuk
 */
class CommandManager
{
    private $cmdDir = "Command";

    /**
     * Constructor of CommandManager
     *
     * @access  public
     */
    public function __construct()
    {
        if (!is_dir(__DIR__ . DIRECTORY_SEPARATOR . $this->cmdDir)) {
            throw new CommandManagerException("Is not directory `$this->cmdDir`");
        }
    }

    /**
     * @param string $cmd
     * @return \AbstractCommand
     * @throws IllegalCommandException
     */
    public function getCommandObject($cmd)
    {
        // throw new \Exception("Uncatched");

        $cmd = ucfirst($cmd);

        $path = __DIR__ . DIRECTORY_SEPARATOR . "{$this->cmdDir}/{$cmd}.php";
        if (!file_exists($path)) {
            throw new IllegalCommandException("Cannot find $path");
        }

        require_once $path;

        $class = "Education\\Command\\$cmd";

        if (!class_exists($class)) {
            throw new IllegalCommandException("Class `$cmd` does not exist");
        }

        $command = new $class();
        if (!$command instanceof \Education\Command\AbstractCommand) {
            throw new IllegalCommandException("`$cmd` is not a Command");
        }
        return $command;
    }
}
