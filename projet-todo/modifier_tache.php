<?php
session_start();
require 'bdd.php';

if (isset($_GET['id'])) {
    $tache_id = $_GET['id'];

    // Récupérer l'état actuel de la tâche
    $stmt = $connexion->prepare("SELECT terminee FROM taches WHERE id = :id");
    $stmt->bindParam(':id', $tache_id);
    $stmt->execute();
    $tache = $stmt->fetch();

    // Inverser l'état (si c'était 1 → devient 0, et inversement)
    $nouvel_etat = $tache['terminee'] ? 0 : 1;

    // Mettre à jour la tâche
    $stmt = $connexion->prepare("UPDATE taches SET terminee = :terminee WHERE id = :id");
    $stmt->bindParam(':terminee', $nouvel_etat);
    $stmt->bindParam(':id', $tache_id);
    $stmt->execute();
}

// Redirection vers le tableau de bord
header('Location: dashboard.php');
exit();
?>
