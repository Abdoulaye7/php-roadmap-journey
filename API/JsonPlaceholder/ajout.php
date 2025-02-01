<?php
require_once 'JsonPlaceholder.php';

$url = 'https://jsonplaceholder.typicode.com/todos';
$jsonPlaceholder = new JsonPlaceholder($url);

// Traitement de l'ajout d'une tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $completed = isset($_POST['completed']) ? true : false;
    $userId = 1; // ID utilisateur statique pour l'exemple

    // Ajouter la tâche via l'API
    $createdTodo = $jsonPlaceholder->createTodo($title, $completed, $userId);

    if ($createdTodo) {
        echo '<div class="container mt-4"><div class="alert alert-success">Tâche ajoutée avec succès !</div></div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de l\'ajout de la tâche.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche - JSONPlaceholder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/cosmo/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ajouter une tâche</h1>

        <!-- Formulaire d'ajout d'une tâche -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la tâche</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed">
                <label class="form-check-label" for="completed">Tâche terminée</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        </form>

        <div class="mt-3">
            <a href="todos.php" class="btn btn-secondary">Retour à la liste des tâches</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
