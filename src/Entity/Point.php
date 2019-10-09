<?php

namespace App\Entity;

class Point {
    /** @var float */
    private $x;

    /** @var float */
    private $y;

    /**
     * Point constructor.
     * @param float $x
     * @param float $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param Point $point
     * @return float
     */
    public function distanceFromPoint($point) {
        return sqrt(pow($point->x - $this->x, 2) + (pow($point->y - $this->y, 2)));
    }
}