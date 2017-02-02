#!/usr/local/bin/php -q
<?php
/**
 * @link http://php.net/manual/en/sockets.examples.php
 */

// report all errors
error_reporting(E_ALL);

// allow the script to hang around waiting for connections
set_time_limit(0);

// turn on implicit output flushing so we see what we're getting as it comes in
ob_implicit_flush();

// settings
$address = '10.10.24.151';
$port = 1000;

// create a streaming socket, of type TCP/IP
if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "socket created\n";
}

// set the option to reuse the port
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

// "bind" the socket to the address to "localhost", on port $port
// so this means that all connections on this port are now our resposibility to send/recv data, disconnect, etc..
if (socket_bind($socket, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "- bind to $address:$port\n";
}

// start listen for connections
if (socket_listen($socket, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "- listen\n";
}

// create a list of all the clients that will be connected to us..
// add the listening socket to this list
$clients = array($socket);

// server loop
do {
    // create a copy, so $clients doesn't get modified by socket_select()
    $read = $clients;

    // no more sockets for monitoring
    $write = $except = null;

    // get a list of all the clients that have data to be read from
    // if there are no clients with data, go to next iteration
    $numChangedSockets = socket_select($read, $write, $except, 0);
    if ($numChangedSockets === false) {
        // error handling
        echo "socket_select() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
    } elseif ($numChangedSockets < 1) {
        // nothing happened
        continue;
    }

    // check if there is a client trying to connect
    if (in_array($socket, $read)) {
        // accept the client, and add him to the $clients array
        $clients[] = $client = socket_accept($socket);

        // client UID
        $key = array_search($client, $clients);

        // send to the client a welcome message
        $msg = "Welcome to the PHP Test Server\r\n" .
            "There are ".(count($clients) - 1)." client(s) connected to the server\r\n" .
            "Your client ID: {$key} \r\n"
        ;
        socket_write($client, $msg, strlen($msg));

        // log message to server console
        socket_getpeername($client, $ip);
        echo "New client '{$key}' connected: {$ip}\n";

        // remove the listening socket from the clients-with-data array
        $key = array_search($socket, $read);
        unset($read[$key]);
    }

    // loop through all the clients that have data to read from
    foreach ($read as $readClient) {
        // read until newline or 1024 bytes
        // socket_read while show errors when the client is disconnected, so silence the error messages
        $data = @socket_read($readClient, 1024, PHP_NORMAL_READ);

        // check if the client is disconnected
        if ($data === false) {
            // remove client for $clients array
            $key = array_search($readClient, $clients);
            unset($clients[$key]);
            echo "Client '{$key}' disconnected.\n";
            // continue to the next client to read from, if any
            continue;
        }

        // trim off the trailing/beginning white spaces
        $data = trim($data);

        // check if there is any data after trimming off the spaces
        if (!empty($data)) {

            // client UID
            $key = array_search($readClient, $clients);

            // prepare message
            $msg = "Client '{$key}': {$data}\r\n";

            // log message to server console
            echo $msg;

            // send this to all the clients in the $clients array (except the first one, which is a listening socket)
            foreach ($clients as $sendClient) {
                // if its the listening socket
                if ($sendClient == $socket) {
                    continue;
                }

                // write the message to the client -- add a newline character to the end of the message
                socket_write($sendClient, $msg);

            } // end of broadcast foreach
        }
    }

} while (true);

socket_close($socket);
?>