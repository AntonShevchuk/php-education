<?php
/**
 * Class DbSessionHandler
 */
class DbSessionHandler implements SessionHandlerInterface
{
    /**
     * Database handler
     *
     * @var mysqli
     */
    protected $handler;

    /**
     * Set Database handler
     *
     * @param mysqli $mysql
     */
    public function setDbHandler($mysql)
    {
        $this->handler = $mysql;
    }

    /**
     * Closes the current session
     *
     * This function is automatically executed when closing the session,
     * or explicitly via session_write_close().
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }

    /**
     * Destroys a session
     *
     * Called by session_regenerate_id() (with $destroy = TRUE), session_destroy() and when session_decode() fails.
     *
     * @param string $session_id
     * @return bool
     */
    public function destroy($session_id)
    {

    }

    /**
     * Cleans up expired sessions
     *
     * Called by session_start(), based on session.gc_divisor, session.gc_probability and session.gc_lifetime settings.
     *
     * @param int $maxlifetime
     * @return bool
     */
    public function gc($maxlifetime)
    {

    }

    /**
     * Re-initialize existing session, or creates a new one
     *
     * Called when a session starts or when session_start() is invoked.
     *
     * @param string $save_path
     * @param string $name
     * @return bool
     */
    public function open($save_path, $name)
    {

    }

    /**
     * Reads the session data from the session storage, and returns the results
     *
     * Called right after the session starts or when session_start() is called.
     * Please note that before this method is called SessionHandlerInterface::open() is invoked.
     *
     * @param string $session_id
     * @return string|void
     */
    public function read($session_id)
    {

    }

    /**
     * Writes the session data to the session storage
     *
     * Called by session_write_close(), when session_register_shutdown() fails, or during a normal shutdown.
     * Note: SessionHandlerInterface::close() is called immediately after this function.
     *
     * @param string $session_id
     * @param string $session_data
     * @return bool|void
     */
    public function write($session_id, $session_data)
    {

    }
}
