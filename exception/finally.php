<?php
try {

    // connect to DB
    $handler = mysqli_connect('localhost', 'root', '', 'test');

    try {
        // some db error
        throw new Exception('DB error');
    } catch (Exception $e) {
        // catch error, and throw another
        throw new Exception('Catch exception', 0, $e);
    } finally {
        // always run
        // close connection
        mysqli_close($handler);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    echo '<br/>';
    echo $e->getPrevious()->getMessage();
}
