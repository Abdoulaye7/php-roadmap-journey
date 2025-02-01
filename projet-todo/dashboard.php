<?php
session_start();
require 'bdd.php';

if (!isset($_SESSION['nom'])) {
    header('Location: connexion.php');
    exit();
}

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $utilisateur_id = $_SESSION['utilisateur_id'];
    $date = $_POST['date'];
    $terminee = isset($_POST['terminee']) ? 1 : 0;

    $stmt = $connexion->prepare("INSERT INTO taches (utilisateur_id, titre, description, date_creation, terminee) 
                                VALUES (:utilisateur_id, :titre, :description, :date_creation, :terminee)");
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date_creation', $date);
    $stmt->bindParam(':terminee', $terminee);
    $stmt->execute();

    $_SESSION['success_message'] = "✅ Tâche ajoutée avec succès !";

    header('Location: dashboard.php');
    exit();
}

require 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-custom {
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            background: #fff;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .task-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .task-item i {
            margin-right: 10px;
        }
        .task-actions a {
            margin-left: 10px;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-tasks"></i> ToDo App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white px-3" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <?= $_SESSION['success_message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <!-- Section principale -->
    <div class="row mt-4">
        <div class="col-md-8">
            <h2 class="mb-4"><i class="fas fa-user"></i> Bonjour, <?= $_SESSION['nom'] ?>!</h2>
            
            <!-- Formulaire pour ajouter une tâche -->
            <div class="card p-4 mb-4">
                <h5 class="card-title"><i class="fas fa-plus-circle"></i> Ajouter une tâche</h5>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="titre" class="form-control" placeholder="Titre de votre tâche" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="Description de votre tâche" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="terminee" value="1">
                        <label class="form-check-label">Tâche terminée ?</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-custom">
                        <i class="fas fa-save"></i> Ajouter
                    </button>
                </form>
            </div>

            <!-- Liste des tâches -->
            <div class="card p-4">
                <h5 class="card-title"><i class="fas fa-list"></i> Vos tâches</h5>
                <div>
                    <?php
                    $stmt = $connexion->prepare("SELECT * FROM taches WHERE utilisateur_id = :utilisateur_id");
                    $stmt->bindParam(':utilisateur_id', $_SESSION['utilisateur_id']);
                    $stmt->execute();
                    $taches = $stmt->fetchAll();

                    foreach ($taches as $tache) :
                    ?>
                        <div class="task-item">
                            <span>
                                <i class="fas <?= $tache['terminee'] ? 'fa-check-circle text-success' : 'fa-hourglass-half text-warning' ?>"></i>
                                <?= htmlentities($tache['titre']) ?>
                            </span>
                            <div class="task-actions">
                                <a href="modifier_tache.php?id=<?= $tache['id'] ?>" class="btn btn-sm btn-info btn-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="supprimer_tache.php?id=<?= $tache['id'] ?>" class="btn btn-sm btn-danger btn-custom">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar utilisateur -->
        <div class="col-md-4">
            <div class="card p-4">
                <h5 class="card-title"><i class="fas fa-user-circle"></i> Profil</h5>
                <p><strong>Nom :</strong> <?= $_SESSION['nom'] ?></p>
                <p><strong>Tâches totales :</strong> <?= count($taches) ?></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>