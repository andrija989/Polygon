<?php

namespace App\Entity;

use App\Entity\Point;

class Polygon {
    private $perimeter;
    private $edges = [];

    public function __construct($edges)
    {
        $this->edges = $edges;
        $this->poligonPerimeter();
    }

    public function getEdges()
    {
        return $this->edges;
    }

    public function getPerimeter()
    {
        return $this->perimeter;
    }

    public function setEdges($edges)
    {
        $this->edges = $edges;
        $this->poligonPerimeter();
    }

    public function poligonPerimeter()
    {
        $newPerimeter = [];
        for($i = 0; $i < count($this->edges); $i++) {
            if($i < count($this->edges) - 1){
                $x = ( pow($this->edges[$i+1][0]-$this->edges[$i][0],2));
                $y = ( pow($this->edges[$i+1][1]-$this->edges[$i][1],2));
                $newPerimeter[] += round( sqrt($x + $y) );
            } else {
                $x = ( pow($this->edges[0][0]-$this->edges[$i][0],2));
                $y = ( pow($this->edges[0][1]-$this->edges[$i][1],2));
                $newPerimeter[] += round( sqrt($x + $y) );
            }

        }
        return $newPerimeter;
    }
}
