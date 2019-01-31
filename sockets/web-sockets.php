#!/usr/bin/env php
<?php
/**
 * Web-Sockets
 *
 * @link https://habrahabr.ru/post/179585/
 * @link https://habrahabr.ru/post/209864/
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
        "Use following code for run server: <code>php -f ./sockets/web-sockets.php</code>" .
        "than open page <a href='/chat.php'>chat.php</a></code>";
    return;
}

// turn on implicit output flushing so we see what we're getting as it comes in
ob_implicit_flush();

// funcitons
require_once 'funcitons.php';

// create a streaming socket server, of type TCP/IP
if (($server = stream_socket_server("tcp://$address:$port", $errNo, $errStr)) === false) {
    echo "stream_socket_server() failed: reason: $errStr($errNo)\n";
} else {
    echo "socket server created\n";
}

// create a list of all the clients
$clients = array($server);

while (true) {
    // create a copy, so $clients doesn't get modified by stream_select()
    $read = $clients;
    // no more sockets for monitoring
    $write = $except = null;

    // get a list of all the clients that have data to be read from
    // if there are no clients with data, go to next iteration
    if (!stream_select($read, $write, $except, null)) {
        break;
    }

    // check if there is a client trying to connect
    if (in_array($server, $read, false)) {
        // accept the client, try to send handshake
        if ($client = stream_socket_accept($server, -1)) {
            // retrieve and check HTTP headers
            $headers = processRequest($client);
            if (isset($headers['Sec-WebSocket-Key'])) {
                $response = handshakeResponse($headers['Sec-WebSocket-Key']);
                // send handshake response
                fwrite($client, $response);
                // send `hello` data
                fwrite($client, encode('Welcome to the PHP Test Server!'));
                // add client to the $clients array
                $clients[] = $client;
                // log message to server console
                $name = stream_socket_get_name($client, true);
                echo "connected: {$name}\n";
            } else {
                echo "invalid client data\n";
            }
        }

        unset($read[array_search($server, $read)]);
    }

    // loop through all the clients that have data to read from
    foreach ($read as $client) {
        $data = fread($client, 100000);

        // close connection
        if (!strlen($data)) {
            fclose($client);
            unset($clients[array_search($client, $clients, false)]);
            continue;
        }
        // received data
        $message = trim(decode($data)['payload']);

        if (!empty($message)) {
            echo "received:\n";
            echo $message . "\n";

            $key = array_search($client, $clients, false);

            broadcast($clients, "<strong>user #{$key}</strong>: $message");
        }
    }
}

function broadcast($clients, $message) {
    // create a copy, so $clients doesn't get modified by stream_select()
    $write = $clients;
    // no more sockets for monitoring
    $read = $except = null;

    array_shift($write);

    $message = encode(strip_tags($message));

    if (stream_select($read, $write, $except, 0)) {
        foreach ($write as $client) {
            @fwrite($client, $message);
        }
    }
}

fclose($server);
