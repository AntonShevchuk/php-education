<?php

/**
 * @todo Realize it!
 */

namespace Education;

class DbSessionHandler implements \SessionHandlerInterface
{
    /**
     * Close the session
     * @link https://php.net/manual/en/sessionhandlerinterface.close.php
     * @return bool
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * Destroy a session
     * @link https://php.net/manual/en/sessionhandlerinterface.destroy.php
     * @param string $id The session ID being destroyed.
     * @return bool
     */
    public function destroy($id): bool
    {
        return true;
    }

    /**
     * Cleanup old sessions
     * @link https://php.net/manual/en/sessionhandlerinterface.gc.php
     * @param int $max_lifetime <p>
     * Sessions that have not updated for
     * the last maxlifetime seconds will be removed.
     * </p>
     * @return bool
     */
    public function gc($max_lifetime): bool
    {
        return true;
    }

    /**
     * Initialize session
     * @link https://php.net/manual/en/sessionhandlerinterface.open.php
     * @param string $path The path where to store/retrieve the session.
     * @param string $name The session name.
     * @return bool
     */
    public function open($path, $name): bool
    {
        return true;
    }


    /**
     * Read session data
     * @link https://php.net/manual/en/sessionhandlerinterface.read.php
     * @param string $id The session id to read data for.
     * @return string
     */
    public function read($id): string
    {
        return '';
    }

    /**
     * Write session data
     * @link https://php.net/manual/en/sessionhandlerinterface.write.php
     * @param string $id The session id.
     * @param string $data <p>
     * The encoded session data. This data is the
     * result of the PHP internally encoding
     * the $_SESSION superglobal to a serialized
     * string and passing it as this parameter.
     * Please note sessions use an alternative serialization method.
     * </p>
     * @return bool
     */
    public function write($id, $data): bool
    {
        return true;
    }
}
