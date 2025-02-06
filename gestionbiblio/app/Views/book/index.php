<?php

use App\Repository\BookRepository;

$books = BookRepository::getAllBooks();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblio - Liste des livres</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-8">Liste des Livres</h1>
      <div class="flex justify-end p-4">
        <a href="/books/add" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
            Ajouter un Livre
        </a>
     </div>


        <div class="bg-white p-6 rounded-lg shadow-md">
            <ul class="space-y-4">
                <?php foreach ($books as $book): ?>
                    <li class="flex justify-between items-center p-4 border-b">
                        <div>
                            <h2 class="text-2xl font-semibold"><?= htmlspecialchars($book['title']) ?></h2>
                            <p class="text-gray-600"><?= htmlspecialchars($book['author']) ?></p>
                        </div>
                        <a href="/books/<?= $book['id'] ?>" class="text-blue-500 hover:text-blue-700">Voir</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</body>
</html>
