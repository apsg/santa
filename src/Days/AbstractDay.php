<?php
namespace Apsg\Santa\Days;

abstract class AbstractDay
{
    public static function print($item)
    {
        print_r($item . PHP_EOL);
    }

    abstract public static function part1();

    abstract public static function part2();
}
