<?php

class Produit{
    public static int $compteur = 0 ;
    private int $id;
    private string $nom;
    private float $prix;
    private string $description;

    public function __construct(string $nom,float $prix,string $description){
        self::$compteur++;
        $this->id = self::$compteur;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
    }

    public function isValid():bool{

        return  empty($this->getErrors());
    }
    public function toJson():string{
        return json_encode([
            'nom' => $this->nom,
            'prix'=> $this->prix,
            'description' => $this->description,
        ]);
    }
    public function toHTML(): string {
        $nom = htmlentities($this->nom);
        $desc = htmlentities($this->description);
        $prix = htmlentities($this->prix);
        
    
        return <<<HTML
        <p> 
            <strong> {$nom} </strong> <em> {$prix} </em> <br>
            {$desc}
        </p>
    HTML;
    }

    public function getErrors(): array {
        $errors = [];
    
        if (empty(trim($this->nom))) {
            $errors['nom'] = 'Le nom est obligatoire';
        } elseif (strlen(trim($this->nom)) < 4) {
            $errors['nom'] = 'Le nom doit faire au moins 4 caractères';
        }
    
        if (empty($this->description)) {
            $errors['description'] = 'La description est obligatoire';
        } elseif (strlen($this->description) < 8) {
            $errors['description'] = 'La description doit faire au moins 8 caractères';
        }
    
        if (!isset($this->prix) || $this->prix <= 0) {
            $errors['prix'] = 'Le prix est obligatoire et doit être supérieur à 0';
        }
    
        return $errors;
    }
    
    public function getId(): int{
        return $this->id;
    }
    public function getNom(): string{
        return $this->nom;
    }
    public function getPrix(): float{
        return $this->prix;
    }
    public function getDescription(): string{
        return $this->description;
    }
    
}

