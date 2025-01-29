<?php
require 'connexion.php';

// Récupérer l'ID passé dans l'URL
$id = $_GET['id'] ?? null;

// Si l'ID est valide, récupérer les données de l'utilisateur
if ($id) {
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Si l'utilisateur existe
    if (!$utilisateur) {
        echo "Utilisateur non trouvé.";
        exit;
    }
}

// Logique pour traiter la mise à jour (si le formulaire est soumis)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $connexion->prepare("UPDATE utilisateurs SET nom = :nom, email = :email, age = :age WHERE id = :id");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();

    echo "Utilisateur mis à jour avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
</head>
<body>

<h1>Modifier l'utilisateur</h1>

<!-- Formulaire de modification -->
<form action="" method="post">
    <p><label for="nom">Nom :</label><br>
    <input type="text" name="nom" id="nom" value="<?= htmlentities($utilisateur['nom']) ?>" required></p>

    <p><label for="email">Email :</label><br>
    <input type="email" name="email" id="email" value="<?= htmlentities($utilisateur['email']) ?>" required></p>

    <p><label for="age">Âge :</label><br>
    <input type="number" name="age" id="age" value="<?= htmlentities($utilisateur['age']) ?>" required></p>

    <p><button type="submit">Mettre à jour</button></p>
</form>

</body>
</html>
