<?php
$utilisateurs = [
   [
     'user' => 'Hafsa',
     'password' => '123'
   ],
   [
     'user' => 'Abdu',
     'password' => '123'
   ],
   [
     'user' => 'Binta',
     'password' => '123'
   ],
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$success = false;

// Vérification des identifiants
if (!empty($username) && !empty($password)) {
    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['user'] === $username && $utilisateur['password'] === $password) {
            $success = true;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
       
        .alert-success {
            border: 2px solid green;
            background-color: green;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>


<?php if ($success) : ?>
    <div class="alert-success">
        <p>Bonjour <?= htmlspecialchars($username); ?>, vous êtes connecté !</p>
    </div>
<?php endif; ?>

<form action="" method="post">
    <p>Username</p>
    <p><input type="text" name="username" value="<?= htmlspecialchars($username); ?>"></p>
    <p>Password</p>
    <p><input type="password" name="password"></p>
    <p><button type="submit">Connexion</button></p>
</form>

</body>
</html>
