<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Ajouter un Livre</h2>
        <form action="/books/add" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Titre du Livre</label>
                <input type="text" id="title" name="title" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-medium mb-2">Nom de l'Auteur</label>
                <input type="text" id="author" name="author" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
                Ajouter le Livre
            </button>
        </form>
    </div>
</body>
</html>
