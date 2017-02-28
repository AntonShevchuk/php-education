#!/usr/local/bin/php -q
<?php
/**
 * @link http://php.net/manual/en/function.stream-socket-server.php
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
        "Use following code for run server: <code>php -f ./sockets/stream-http.php</code>" .
        "than open page <a href='http://$address:$port'>http://$address:$port</a></code>";
    return;
}

// turn on implicit output flushing so we see what we're getting as it comes in
ob_implicit_flush();

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
    if (in_array($server, $read)) {
        // accept the client, and add him to the $clients array
        $clients[] = $client = stream_socket_accept($server, -1);

        // log message to server console
        $name = stream_socket_get_name($client, true);
        echo "connected: {$name}\n";

        // remove the listening socket from the clients-with-data array
        $key = array_search($server, $read);
        unset($read[$key]);
    }

    // loop through all the clients that have data to read from
    foreach ($read as $connect) {
        // read HTTP request
        $request = '';
        while ($buffer = rtrim(fgets($connect))) {
            $request .= "\t".$buffer."\n";
        }
        echo "received:\n";
        echo $request;

        $response = "HTTP/1.1 200 OK\r\n" .
            "Content-Type: text/html\r\n" .
            "Connection: close\r\n" .
            "\r\n" .
            "Hello!";

        // send HTTP response
        fwrite($connect, $response);

        echo "send response\n";

        // log message to server console
        $name = stream_socket_get_name($connect, true);
        echo "disconnected: {$name}\n\n";

        // disconnect
        fclose($connect);
        unset($clients[array_search($connect, $clients)]);
    }
}

fclose($server);
?>