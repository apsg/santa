<?php

namespace Apsg\Santa\Days\Day4;

class Validator
{
    public function validate(int $number) : int
    {
        if (!$this->validateDoubles($number)) {
            return 0;
        }

        if (!$this->validateIncrease($number)) {
            return 0;
        }

        return 1;
    }

    protected function validateDoubles(int $number) : bool
    {
        $regex = '/[0]{2}|[1]{2}|[2]{2}|[3]{2}|[4]{2}|[5]{2}|[6]{2}|[7]{2}|[8]{2}|[9]{2}/';

        return preg_match($regex, (string)$number);
    }

    protected function validateIncrease(int $number) : bool
    {
        $digits = str_split($number);

        for ($i = 1; $i < 6; $i++) {
            if ($digits[$i] < $digits[$i - 1]) {
                return false;
            }
        }

        return true;
    }
}
