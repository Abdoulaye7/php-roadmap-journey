<?php

class Voiture{
    private string $marque;
    private string $model;
    private string $annee;
    private string $couleur;

    public function __construct(string $marque,string $model,string $annee,string $couleur){
        $this->marque = $marque;
        $this->model  = $model;
        $this->annee  = $annee;
        $this->couleur= $couleur;
    }
   
    public function demarrer():void{
        echo "La voiture $this->marque démarre ";
    }
   public function getMarque():string{
        return $this->marque;
   }
   public function getModel():string{
    return $this->model;
  }
  public function getAnnee():string{
    return $this->annee;
 } 
 public function getCouleur():string{
    return $this->couleur;
 }
}
$voitures = [
    new Voiture('Toyota','Toyota22','2022','Rouge'),
    new Voiture('Honda','Hondaxz','2018','Noire'),
    new Voiture('BMW','BMWxcv','2023','Blanc'),
    new Voiture('Peugeot','PeugeotVNC','2022','Gris'),
];
 foreach($voitures as $voiture){
    echo "<div>";
    echo $voiture->getMarque().PHP_EOL;
    echo $voiture->getModel().PHP_EOL;
    echo $voiture->getAnnee().PHP_EOL;
    echo $voiture->getCouleur().PHP_EOL;
    
    echo "</div>";
    echo "<strong>----------";
    echo $voiture->demarrer();
    echo "</strong>";
 }