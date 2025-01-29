<?php

require '../interface/Forme.php';

class Rectangle implements Forme{
    private float $longueur;
    private float $largeur;

    public function __construct(float $longueur,float $largeur){
        $this->longueur = $longueur;
        $this->largeur  = $largeur;
    }
   

    public function calculerAire(): float
    {
        return $this->longueur * $this->largeur;
    }
    public function getLongueur():float{
        return $this->longueur;
    }
    public function getLargeur():float{
        return $this->largeur;
    }

}

$rec1 = new Rectangle(8,5);
echo $rec1->calculerAire();