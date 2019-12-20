<?php
namespace Apsg\Santa\Days\Day4;

class Validator2 extends Validator
{
    protected function validateDoubles(int $number) : bool
    {
        $regex = '/([0]{2})|([1]{2})|([2]{2})|([3]{2})|([4]{2})|([5]{2})|([6]{2})|([7]{2})|([8]{2})|([9]{2})/';

        $matches2 = [];
        preg_match_all($regex, (string)$number, $matches2);

        if (empty($matches2) || empty($matches2[0])) {
            return false;
        }

        foreach ($matches2[0] as $match) {
            $digit = substr($match, 0, 1);

            if (substr_count((string)$number, $digit) == 2) {
                return true;
            }
        }

        return false;
    }
}
