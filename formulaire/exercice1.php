<?php
 $nom = $_POST['nom'];
 $age = $_POST['age'];

 $success = false;

  if(isset($nom) && isset($age))
  {
    $success = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement formulaire</title>
    <style>
     .alert-success{
        border: 2px solid green;
        background-color: green;
        color: white;
     }
    </style>
</head>
<body>
    <div class="container">
    <?php if ($success) : ?>
        <div class="alert-success">
           <p>Bonjour  <?= $nom; ?> vous avez <?= $age; ?></p>
        </div>
    <?php endif ?>
 </div>
    <form action="" method="post">
        <p>Nom :</p>
        <p><input type="text" name="nom" id="" value="<?= $nom;?>"></p>
        <p>Age :</p>
        <p><input type="number" name="age" id="" value="<?= $age?>"></p>
        <p><button type="submit">Valider</button></p>
    </form>
</body>
</html>