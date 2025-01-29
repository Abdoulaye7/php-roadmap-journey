<?php

class Compteur{
    public static int $nombreInstances = 0;

    public function __construct(){
        self::$nombreInstances++;
    }
    public function getNombreInstances():int{
        return self::$nombreInstances;
    }
   
}
$compteur1 = new Compteur();
echo $compteur1->getNombreInstances();  // Affiche 1

$compteur2 = new Compteur();
echo $compteur2->getNombreInstances();  // Affiche 2

$compteur3 = new Compteur();
echo $compteur3->getNombreInstances();  // Affiche 3
