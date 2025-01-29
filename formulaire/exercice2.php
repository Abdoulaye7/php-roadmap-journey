<?php
 $nom = $_POST['nom'] ?? '';
 $email = $_POST['email'] ?? '';
 $age = $_POST['age'] ?? '';

 $success = false;
 $errors = [];


    if (empty($nom)) {
        $errors[] = 'Le nom ne doit pas être vide.';
    } elseif (strlen($nom) < 4) {
        $errors[] = 'Le nom doit faire au minimum 4 caractères.';
    }
    if(empty($email)){
        $errors [] = 'L\'email est obligatoire';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors [] = 'L\'email est incorrecte';
    }
    if (empty($age)) {
        $errors[] = "L'âge ne doit pas être vide.";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT)) {
        $errors[] = "L'âge doit être un entier.";
    }
    if (empty($errors)) {
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
        .alert-success {
            border: 2px solid green;
            background-color: green;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }
        .erreurs {
            border: 2px solid red;
            background-color: red;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php if (!empty($errors)) : ?>
    <div class="erreurs">
        <?php foreach ($errors as $error) : ?>
            <p><?= htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    <div class="container">
    <?php if ($success) : ?>
    <div class="alert-success">
        <p>Bonjour <?= htmlspecialchars($nom); ?>, vous avez <?= (int)$age; ?> ans.</p>
    </div>
<?php endif; ?>
 </div>
    <form action="" method="post">
        <p>Nom :</p>
        <p><input type="text" name="nom" id="" value="<?= htmlspecialchars($nom); ?>"></p>
        <p>Email :</p>
        <p><input type="email" name="email" id="" value="<?= htmlspecialchars($email); ?>"></p>
        <p>Age :</p>
        <p><input type="number" name="age" id="" value="<?= htmlspecialchars($age); ?>"></p>
        <p><button type="submit">Valider</button></p>
    </form>
</body>
</html>