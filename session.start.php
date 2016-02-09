<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

session_start();

$userAgent = $_SERVER['HTTP_USER_AGENT'];
$userIp = $_SERVER['REMOTE_ADDR'];
$userIpBehindProxy = isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'';


if (!isset($_SESSION['time'])) {
    $_SESSION['ua'] = $userAgent;
    $_SESSION['ip'] = $userIp;
    $_SESSION['ff'] = $userIpBehindProxy;
    $_SESSION['time'] = date("H:i:s");
}

if ($_SESSION['ua'] != $userAgent
    or $_SESSION['ip'] != $userIp
    or $_SESSION['ff'] != $userIpBehindProxy) {
    /**
     * Clear cookie, destroy session data
     * @link http://php.net/function.session-destroy
     */
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    // Finally, destroy the session.
    session_destroy();
    die('Wrong browser');
}

echo $_SESSION['time'];