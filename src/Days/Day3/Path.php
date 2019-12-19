<?php

namespace Apsg\Santa\Days\Day3;

class Path
{
    /** @var array */
    protected $path = [];

    public function __construct(string $path = '')
    {
        $this->path = [];

        $this->parse($path);
    }

    public function add(Point $point)
    {
        $this->path[$point->key()] = $point;
    }

    public function move(string $move) : self
    {
        $direction = substr($move, 0, 1);
        $length = substr($move, 1);

        $x = 0;
        $y = 0;

        if ($direction == 'L') {
            $this->moveHorizontally($length, -1);
        }
        if ($direction == 'R') {
            $this->moveHorizontally($length, 1);
        }
        if ($direction == 'D') {
            $this->moveVertically($length, -1);
        }
        if ($direction == 'U') {
            $this->moveVertically($length, 1);
        }

        return $this;
    }

    protected function moveHorizontally(int $distance, int $sign = 1) : self
    {
        $last = $this->last();

        for ($i = 1; $i <= $distance; $i++) {
            $this->add(new Point($last->x + $sign * $i, $last->y));
        }

        return $this;
    }

    protected function moveVertically(int $distance, int $sign = 1) : self
    {
        $last = $this->last();

        for ($i = 1; $i <= $distance; $i++) {
            $this->add(new Point($last->x, $last->y + $sign * $i));
        }

        return $this;
    }

    public function parse(string $path) : self
    {
        foreach (explode(',', $path) as $move) {
            $this->move($move);
        }

        return $this;
    }

    public function intersections(self $otherPath) : array
    {
        $intersections = [];

        foreach ($this->path as $key => $value) {
            if ($otherPath->exists($key)) {
                $intersections[] = $value;
            }
        }

        return $intersections;
    }

    public function exists(string $key) : bool
    {
        return isset($this->path[$key]);
    }

    protected function last() : Point
    {
        if (empty($this->path)) {
            return new Point(0, 0);
        }

        return end($this->path);
    }
}
