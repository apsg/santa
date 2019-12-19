<?php
namespace Apsg\Santa\Days;

class Day2
{
    const INPUT = '1,12,2,3,1,1,2,3,1,3,4,3,1,5,0,3,2,6,1,19,1,19,9,23,1,23,9,27,1,10,27,31,1,13,31,35,1,35,10,39,2,39,9,43,1,43,13,47,1,5,47,51,1,6,51,55,1,13,55,59,1,59,6,63,1,63,10,67,2,67,6,71,1,71,5,75,2,75,10,79,1,79,6,83,1,83,5,87,1,87,6,91,1,91,13,95,1,95,6,99,2,99,10,103,1,103,6,107,2,6,107,111,1,13,111,115,2,115,10,119,1,119,5,123,2,10,123,127,2,127,9,131,1,5,131,135,2,10,135,139,2,139,9,143,1,143,2,147,1,5,147,0,99,2,0,14,0';

    public static function part1()
    {
        $program = explode(',', static::INPUT);

        $result = self::program($program);

        echo $result;
    }

    public static function part2()
    {
        $program = explode(',', static::INPUT);
        for ($noun = 0; $noun < 100; $noun++) {
            for ($verb = 0; $verb < 100; $verb++) {

                $newProgram = $program;
                $newProgram[1] = $noun;
                $newProgram[2] = $verb;

                if (self::program($newProgram) == 19690720) {
                    echo 100 * $noun + $verb;

                    return;
                }
            }
        }
    }

    public static function run(array &$program, int $position) : int
    {
        $command = $program[$position];

        if ($command == '99') {
            return -1;
        }

        $pos1 = $program[$position + 1];
        $pos2 = $program[$position + 2];
        $target = $program[$position + 3];

        if ($command == 1) {
            $program[$target] = $program[$pos1] + $program[$pos2];
        }

        if ($command == 2) {
            $program[$target] = $program[$pos1] * $program[$pos2];
        }

        return $position + 4;
    }

    protected static function program(array $program)
    {
        $pointer = 0;
        while ($pointer >= 0) {
            $pointer = self::run($program, $pointer);
        }

        return $program[0];
    }
}
