<?php
namespace Apsg\Santa\Days;

use Apsg\Santa\Days\Day4\Validator;
use Apsg\Santa\Days\Day4\Validator2;

class Day4 extends AbstractDay
{
    const START = 137683;
    const END = 596253;

    public static function part1()
    {
        $count = 0;
        $validator = new Validator();

        for ($i = static::START; $i <= static::END; $i++) {
            $count+= $validator->validate($i);
        }

        static::print($count);
    }

    public static function part2()
    {
        $validator = new Validator2();
        $count = 0;

        for ($i = static::START; $i <= static::END; $i++) {
            $count+= $validator->validate($i);
        }

        static::print($count);
    }
}
