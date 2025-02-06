<?php

namespace App\Repository;

use App\Models\BD;

use PDO;

class BookRepository {

    public static function getAllBooks(){

        $connexion = BD::getInstance();

        $stmt = $connexion->query('SELECT * FROM Books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function show($id){
        $connexion = BD::getInstance();
        $stmt = $connexion->prepare('SELECT * from Books where id = :id');
        $stmt->bindParam('id',$id,PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
       
    }
    public static function addBook($title, $author) {
        $connexion = BD::getInstance();
        $stmt = $connexion->prepare("INSERT INTO Books (title, author) VALUES (:title, :author)");
        $stmt->execute([
            ':title' => $title,
            ':author' => $author
        ]);
    }

    public static function updateBook($id, $title, $author) {
        $connexion = BD::getInstance();
        $stmt = $connexion->prepare("UPDATE Books SET title = :title, author = :author WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':author' => $author
        ]);
    }
    
}