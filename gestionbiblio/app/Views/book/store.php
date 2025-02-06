<?php

use App\Repository\BookRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');

    if (empty($title) || empty($author)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

   
    BookRepository::addBook($title, $author);

    
    header("Location: /books");
    exit;
}
?>
