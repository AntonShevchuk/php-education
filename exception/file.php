<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$directory = __DIR__ . DIRECTORY_SEPARATOR . 'logs';


class FileSystemException extends Exception {}

class DirectoryException extends FileSystemException {
    const DIRECTORY_NOT_EXISTS =  1;
    const DIRECTORY_NOT_WRITABLE = 2;
}

class FileException extends FileSystemException {}


try {
    // код который пишет в файл
    if (!is_dir($directory)) {
        throw new DirectoryException('Directory `logs` is not exists', DirectoryException::DIRECTORY_NOT_EXISTS);
    }

    if (!is_writable($directory)) {
        throw new DirectoryException('Directory `logs` is not writable', DirectoryException::DIRECTORY_NOT_WRITABLE);
    }

    if (!$file = @fopen($directory . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log', 'a+')) {
        throw new FileException('System can\'t open log file');
    }

    fputs($file, date("[H:i:s]") . " done\n");
    fclose($file);
} catch (DirectoryException $e) {
    echo "С директорией возникла проблема: ". $e->getMessage();
} catch (FileException $e) {
    echo "С файлом возникла проблема: ". $e->getMessage();
} catch (FileSystemException $e) {
    echo "Ошибка файловой системы: ". $e->getMessage();
} catch (Exception $e) {
    echo "Ошибка сервера: ". $e->getMessage();
}
