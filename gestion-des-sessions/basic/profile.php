<?php
session_start();

if (!isset($_SESSION['email'])) {
   
    header('Location: connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css">
    <title>Page Profil</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Bienvenue sur votre profil</h2>
        <div class="alert alert-success">
            <p>Bonjour, <?= $_SESSION['email'] ?></p>
        </div>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    </div>
</body>
</html>
