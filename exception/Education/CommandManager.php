<?php
/**
 * @namespace
 */
namespace Education;

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
        $cmd = ucfirst($cmd);

        $path = __DIR__ . DIRECTORY_SEPARATOR . "{$this->cmdDir}/{$cmd}.php";
        if (!file_exists($path)) {
            throw new IllegalCommandException("Cannot find $path");
        }

        require_once $path;

        if (!class_exists($cmd)) {
            throw new IllegalCommandException("Class `$cmd` does not exist");
        }

        $command = new $cmd();
        if (!$command instanceof \AbstractCommand) {
            throw new IllegalCommandException("`$cmd` is not a Command");
        }
        return $command;
    }
}
