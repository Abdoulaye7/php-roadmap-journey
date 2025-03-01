<?php

$filename = "users.txt";

 if(isset($_GET['action'])){
    $action = $_GET['action'];
    
    if($action === 'create'){
        if(isset($_POST['nom'])){
            $nom = htmlspecialchars($_POST['nom']);
            file_put_contents($filename,$nom.PHP_EOL,FILE_APPEND);
            echo json_encode("Utilisateur ajoute : " . $nom);
            
        }else{
            echo json_encode("Erreur : Aucun nom reçu.");
        }
    }
    if($action === 'read'){
        $users =  file($filename, FILE_IGNORE_NEW_LINES);
        echo json_encode($users);
        
    }
 }
    if ($action == "delete") {
        if (isset($_POST["nom"])) {
            $nom = $_POST["nom"];
            $users = file($filename, FILE_IGNORE_NEW_LINES);
            $users = array_filter($users, function($u) use ($nom) { return $u !== $nom; });
            file_put_contents($filename, implode("\n", $users) . "\n");
            echo json_encode("Utilisateur supprimé : " . $nom);
        } else {
            echo json_encode("Erreur : Aucun nom reçu.");
        }
    }

?>