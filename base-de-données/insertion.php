<?php
require 'connexion.php';

$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';

$success = false;
$errors = [];

 if(empty($nom)){
    $errors [] = 'Le nom est obligatoire';
 }elseif(strlen($nom) < 4){
    $errors [] = 'Le nom doit comporter 4 caractères minimun';
 }
 if(empty($email)){
    $errors [] = 'L\'email est obligatoire';
 }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors [] = 'L\'eamil est incorrecte';
 }
 if(empty($age)){
    $errors [] = 'L\'age est obligatoire';
 }
  if(empty($errors)){

    $stmt = $connexion->prepare("INSERT INTO utilisateurs(nom,email,age) VALUES(:nom,:email,:age)");
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':age',$age);

    $stmt->execute();

    $success = true;
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion en base de données</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <?php foreach($errors as $error) :?>
            <div class="danger">
            <p><?=$error?></p>
            </div>
        <?php endforeach;?>
 
    <?php if ($success) : ?>
    <div class="alert-success">
        <p>Utilisateur ajouté avec succès</p>
    </div>
  <?php endif; ?>
    
    <div class="container">
    <h1>Formulaire d'ajout</h1>
    <form action="" method="post">
        <p>Nom :</p>
        <p><input type="text" name="nom"  value="<?=htmlentities($nom) ?>"></p>
        <p>Email :</p>
        <p><input type="email" name="email"  value="<?=htmlentities($email) ?>"></p>
        <p>Age :</p>
        <p><input type="text" name="age"  value="<?=htmlentities($age) ?>"></p>
        <p><button type="submit">Ajouter</button></p>
    </form>
    </div>
</body>
</html>