<?php
require '../interface/Forme.php';

class Cercle implements Forme {
    private float $rayon;

    public function __construct(float $rayon){
        $this->rayon = $rayon;
    }
    public function getRayon():float{
        return $this->rayon;
    }

    public function calculerAire(): float
    {
        return M_PI* $this->rayon * $this->rayon;
    }

}

$c1 = new Cercle(2.0);
echo round($c1->calculerAire(),2);