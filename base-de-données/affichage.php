<?php
require 'connexion.php';

$stmt = $connexion->query("SELECT * FROM utilisateurs ORDER BY nom");
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <?php foreach($utilisateurs as $utilisateur):?>
        <p> <?=$utilisateur['nom'] ?></p>
        <p>
            <strong> <?=$utilisateur['email'] ?></strong>
        </p>
        <p><i><?=$utilisateur['age'] ?></i></p>
        <p>
                <a href="modifier.php?id=<?=$utilisateur['id']?>" class="modifier-btn">Modifier</a>
                <a href="supprimer.php?id=<?=$utilisateur['id']?>" class="supprimer-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
            </p>
    <?php endforeach;?>
    
</body>
</html>