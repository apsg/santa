<?php
require __DIR__ . '/../vendor/autoload.php';

$day = $argv[1];
$part = $argv[2];

$classname = "\\Apsg\\Santa\\Days\\Day{$day}";

call_user_func($classname . '::part' . $part);

echo PHP_EOL;
