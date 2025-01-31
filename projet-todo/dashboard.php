<?php
// Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
session_start();
if (!isset($_SESSION['nom'])) {
    header('Location: connexion.php');
    exit();
}

require 'header.php';
?>


    <div class="container mt-5">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">ToDo App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Section principale -->
        <div class="row mt-5">
            <div class="col-md-8">
                <h2>Bonjour, <?= $_SESSION['nom'] ?>!</h2>
                <p>Bienvenue sur votre tableau de bord. Vous pouvez gérer vos tâches ci-dessous.</p>
                
                <!-- Formulaire pour ajouter une tâche -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter une tâche</h5>
                        <form action="ajouter_tache.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="tache" class="form-control" placeholder="Entrez une nouvelle tâche" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>

                <!-- Liste des tâches -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Vos tâches</h5>
                        <ul class="list-group">
                            <!-- Exemple de tâche -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Exemple de tâche à faire
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </li>
                            <!-- Ajoute ici les tâches dynamiquement en fonction des données de la base -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar ou autre contenu si nécessaire -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations utilisateur</h5>
                        <p>Nom : <?= $_SESSION['nom'] ?></p>
                        <p>Nombre de tâches : <!-- Dynamique ici --></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



