#!/usr/local/bin/php -q
<?php
/**
 * @link http://php.net/manual/en/sockets.examples.php
 */

// report all errors
error_reporting(E_ALL);

// allow the script to hang around waiting for connections
set_time_limit(0);

// settings
$address = '127.0.0.1';
$port = 10000;

// сheck CLI
if (PHP_SAPI !== 'cli') {
    echo
        "<br/>\n" .
        "Use following code for run server: <code>php -f ./sockets/one.php</code>" .
        "than try to connect to it: <code>telnet $address $port</code>";
    return;
}

// turn on implicit output flushing so we see what we're getting as it comes in
ob_implicit_flush();

// create a streaming socket, of type TCP/IP
if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
    die();
} else {
    echo "socket created\n";
}

// "bind" the socket to the address to "localhost", on port $port
// so this means that all connections on this port are now our resposibility to send/recv data, disconnect, etc..
if (socket_bind($socket, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($socket)) . "\n";
    die();
} else {
    echo "- bind to $address:$port\n";
}

// start listen for connections
if (socket_listen($socket, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($socket)) . "\n";
    die();
} else {
    echo "- listen\n";
}

// server loop
do {
    // accept the client
    if (($client = socket_accept($socket)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($socket)) . "\n";
        break;
    }
    // send instructions
    $msg = "\nWelcome to the PHP Test Server!\r\n" .
        "To quit, type 'quit'. To shut down the server type 'shutdown'.\r\n";
    socket_write($client, $msg, strlen($msg));

    // read socket loop
    do {
        // read until newline or 1024 bytes
        if (false === ($buf = socket_read($client, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($client)) . "\n";
            break 2;
        }
        $buf = trim($buf);
        // nothing
        if (!$buf) {
            continue;
        }
        // `quit` for break read loop
        if ($buf == 'quit') {
            break;
        }
        // `shutdown` for break server loop
        if ($buf == 'shutdown') {
            socket_close($client);
            break 2;
        }
        $talkback = "PHP: You said '$buf'.\r\n";
        socket_write($client, $talkback, strlen($talkback));
        echo $buf;
    } while (true);
    socket_close($client);
} while (true);
socket_close($socket);
?>