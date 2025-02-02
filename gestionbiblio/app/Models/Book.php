<?php
namespace APP\Models;

class Book{
    private $id;
    private $title;
    private $author;

    public function __construct($title, $author ) {
       
        $this->title = $title;
        $this->author = $author;
    }

     // Acesseur pour l'ID
     public function getId() {
        return $this->id;
    }

    // Mutateur pour l'ID
    public function setId($id) {
        $this->id = $id;
    }

    // Acesseur pour le titre
    public function getTitle() {
        return $this->title;
    }

    // Mutateur pour le titre
    public function setTitle($title) {
        $this->title = $title;
    }

    // Acesseur pour l'auteur
    public function getAuthor() {
        return $this->author;
    }

    // Mutateur pour l'auteur
    public function setAuthor($author) {
        $this->author = $author;
    }
}