<?php
require_once 'JsonPlaceholder.php';

$url = 'https://jsonplaceholder.typicode.com/todos';
$jsonPlaceholder = new JsonPlaceholder($url);

$todos = $jsonPlaceholder->getTodos();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$totalTodos = count($todos);
$totalPages = ceil($totalTodos / $perPage);
$offset = ($page - 1) * $perPage;
$paginatedTodos = array_slice($todos, $offset, $perPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tâches - JSONPlaceholder</title>
    <!-- Bootswatch CSS (thème Cosmo) -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/cosmo/bootstrap.min.css" rel="stylesheet">
    <style>
        .completed {
            color: green;
            font-weight: bold;
        }
        .in-progress {
            color: orange;
            font-weight: bold;
        }
        .pagination {
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestion des tâches</h1>

        <!-- Bouton pour ajouter une tâche -->
        <div class="text-end mb-3">
            <a href="#" class="btn btn-primary">Ajouter une tâche</a>
        </div>

        <!-- Tableau des tâches -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Utilisateur ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paginatedTodos as $todo) : ?>
                    <tr>
                        <th scope="row"><?= $todo['id'] ?></th>
                        <td><?= $todo['userId'] ?></td>
                        <td><?= htmlspecialchars($todo['title']) ?></td>
                        <td>
                            <span class="<?= $todo['completed'] ? 'completed' : 'in-progress' ?>">
                                <?= $todo['completed'] ? 'Terminée' : 'En cours' ?>
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Précédent">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Suivant">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JS (optionnel, pour les fonctionnalités interactives) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>