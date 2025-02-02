<?php

use App\Repository\BookRepository;

if (!isset($match['params']['id'])) {
    echo "ID du livre invalide.";
    exit;
}

$id = (int) $match['params']['id']; 

$book = BookRepository::show($id); 

if (!$book) {
    echo "Livre non trouvé.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($book['title']) ?> - Détails</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold mb-4"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="text-xl text-gray-700">Auteur: <span class="font-semibold"><?= htmlspecialchars($book['author']) ?></span></p>
        </div>

        <div class="mt-8">
            <a href="/books" class="text-blue-500 hover:text-blue-700">Retour à la liste des livres</a>
        </div>
    </div>

</body>
</html>
