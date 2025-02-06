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
    <title>Modifier un Livre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Modifier le Livre</h2>
        <form action="/books/update/<?= $id ?>" method="POST" class="space-y-4">
            <div>
                <label for="title" class="block text-gray-700 font-semibold">Titre du livre :</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="author" class="block text-gray-700 font-semibold">Auteur :</label>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 transition">Modifier</button>
        </form>
    </div>
</body>
</html>
