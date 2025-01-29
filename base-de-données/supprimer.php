<?php
require 'connexion.php';

// Vérifier si l'ID est passé dans l'URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Préparer et exécuter la requête de suppression
    $stmt = $connexion->prepare("DELETE FROM utilisateurs WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Si la suppression réussit
    if ($stmt->execute()) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Une erreur est survenue lors de la suppression de l'utilisateur.";
    }
} else {
    echo "ID d'utilisateur non spécifié.";
}
?>
