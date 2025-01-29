<?php

class CompteBancaire{
    private string $titulaire;
    private float $solde;

    public function __construct(string $titulaire,float $solde){
        $this->titulaire = $titulaire;
        $this->solde     = $solde;
    }

    public function deposer(float $montant):void{
            $this->solde +=$montant;
    }
    public function retirer(float $montant):void{
        $this->solde -=$montant;

        if($this->solde < 0){
            $this->solde = 0;
        }
}
    public function getTitulaire():string{
        return $this->titulaire;
    }
    public function getSolde():float{
        return $this->solde;
    }
}

$compte = new CompteBancaire("Jean Dupont", 1000);


echo "Solde initial: " . $compte->getSolde() . "\n";

$compte->deposer(500);
echo "Après dépôt de 500: " . $compte->getSolde() . "\n";

$compte->deposer(300);
echo "Après dépôt de 300: " . $compte->getSolde() . "\n";

$compte->retirer(200);
echo "Après retrait de 200: " . $compte->getSolde() . "\n";

$compte->retirer(1000);
echo "Après retrait de 1000: " . $compte->getSolde() . "\n";

$compte->retirer(1500);
echo "Après tentative de retrait de 1500: " . $compte->getSolde() . "\n";
