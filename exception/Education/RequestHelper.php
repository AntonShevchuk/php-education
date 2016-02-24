<?php
/**
 * @namespace
 */
namespace Education;

use Education\Exception\EducationException;
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

    /**
     * RequestHelper constructor.
     * @param null $request_array
     */
    public function __construct($request_array = null)
    {
        if (!is_array($this->request = $request_array)) {
            $this->request = $_REQUEST;
        }
    }

    /**
     * @return mixed
     * @throws EducationException
     */
    public function getCommandString()
    {
        if ($this->command) {
            return $this->command;
        } else {
            if (isset($this->request['cmd'])) {
                $this->command = $this->request['cmd'];
                return $this->command;
            } else {
                throw new EducationException("Request parameter `cmd` not found");
            }
        }
    }

    /**
     * @throws EducationException
     * @throws IllegalCommandException
     * @throws \Exception
     */
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
            throw new EducationException("Package error", 0, $e);
        }
    }
}
