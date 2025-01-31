<?php

require_once 'Produit.php';

class ProduitManager{
    private $file;

    public function __construct(string $file){

        $directory = dirname($file);
        if(!is_dir($directory)){
            mkdir($directory,0777,true);
        }
        if(!file_exists($file)){
            touch($file);
        }
        $this->file = $file;
    }

    public function addProduct(Produit $produit):void{
        file_put_contents($this->file,$produit->toJson().PHP_EOL,FILE_APPEND);
    }
    public function getProducts():array{
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL,$content);
        $products = [];

        foreach($lines as $line){
            $data = json_decode($line,true);
            $products [] = new Produit($data['nom'],$data['prix'],$data['description']);

        }
        return $products;
    }
    
}