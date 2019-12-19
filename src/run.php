<?php
require __DIR__ . '/../vendor/autoload.php';

$day = $argv[1];
$part = $argv[2];

$classname = "\\Apsg\\Santa\\Days\\Day{$day}";

set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

try {
    call_user_func($classname . '::part' . $part);
} catch (ErrorException $e) {
    echo 'Wrong input';
}

restore_error_handler();

echo PHP_EOL;
