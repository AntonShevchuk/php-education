<?php

/**
 * Equal to session_start()
 *
 * @see session_start
 */
function sess_start()
{
    $id = sess_id() ?: uniqid('SESS_', true);

    sess_id($id);

    $file = $GLOBALS['_SESS_DIR'] . $id . '.sess';
    if (file_exists($file)) {
        $GLOBALS['_SESS'] = unserialize(file_get_contents($file), ['allowed_classes' => true]);
    } else {
        $GLOBALS['_SESS'] = [];
    }
}

/**
 * Equal to session_id()
 *
 * @param string $id
 * @return string
 * @see session_id
 */
function sess_id($id = null)
{
    static $sess_id;

    if ($id) {
        $sess_id = $id;
        setcookie('PHPSESS', $sess_id, null, null, null, null, true);
    }

    if ($sess_id) {
        return $sess_id;
    }

    if (isset($_COOKIE['PHPSESS'])) {
        $sess_id = $_COOKIE['PHPSESS'];
    }
    return $sess_id;
}

/**
 * Shutdown function
 */
function sess_shutdown()
{
    if ($id = sess_id()) {
        $file = $GLOBALS['_SESS_DIR'] . $id . '.sess';
        file_put_contents($file, serialize($GLOBALS['_SESS']));
    }
}
