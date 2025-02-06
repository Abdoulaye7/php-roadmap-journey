<?php

use App\Repository\BookRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($match['params']['id'])) {
        echo "ID du livre invalide.";
        exit;
    }

    $id = (int) $match['params']['id'];
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');

    if (empty($title) || empty($author)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Mettre à jour le livre
    BookRepository::updateBook($id, $title, $author);

    // Redirection après modification
    header("Location: /books");
    exit;
}
?>
