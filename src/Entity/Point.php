<?php

namespace App\Entity;

class Point {
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function distance($dot1, $dot2)
    {
        return sqrt(pow($dot2->x - $dot1->x, 2) + (pow($dot2->y - $dot1->y, 2)));
    }
}