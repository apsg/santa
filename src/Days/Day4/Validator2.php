<?php
namespace Apsg\Santa\Days\Day4;

class Validator2 extends Validator
{
    protected function validateDoubles(int $number) : bool
    {
        $regex = '/([0]{2})|([1]{2})|([2]{2})|([3]{2})|([4]{2})|([5]{2})|([6]{2})|([7]{2})|([8]{2})|([9]{2})/';

        $matches = [];
        preg_match_all($regex, (string)$number, $matches);

        if (empty($matches) || empty($matches[0])) {
            return false;
        }

        foreach ($matches[0] as $match) {
            $digit = $match / 11;
            if (preg_match("/[$digit]{3,}/", (string)$number)) {
                return false;
            }

            return true;
        }

        return true;
    }
}
