<?php
/**
 * @namespace
 */
namespace Education;

use Education\Exception\IllegalCommandException;

/**
 * RequestHelper
 *
 * @package  Education
 * @author   Anton Shevchuk
 */
class RequestHelper
{
    private $request = array();
    private $default= 'DefaultCommand';
    private $command;

    public function __construct($request_array = null)
    {
        if (!is_array($this->request = $request_array)) {
            $this->request = $_REQUEST;
        }
    }

    public function getCommandString()
    {
        return ($this->command ? $this->command : ($this->command = $this->request['cmd']));
    }

    public function runCommand()
    {
        $command = $this->getCommandString();
        try {
            $manager = new CommandManager();
            $cmd = $manager->getCommandObject($command);
            $cmd->execute();
        } catch (IllegalCommandException $e) {
            error_log($e->getMessage());
            if ($command != $this->default) {
                $this->command = $this->default;
                $this->runCommand();
            } else {
                throw $e;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
