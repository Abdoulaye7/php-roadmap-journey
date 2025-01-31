<?php
session_start();

session_unset(); 
session_destroy(); // Détruire la session
header('Location: connexion.php');
exit();
?>
