<?php

namespace Apsg\Santa\Days\Day3;

class Point
{
    /** @var int */
    public $x;

    /** @var int */
    public $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function equals(self $point)
    {
        return $this->x == $point->x && $this->y == $point->y;
    }

    public function key() : string
    {
        return "{$this->x}:{$this->y}";
    }
}
