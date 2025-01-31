
<?php
session_start();

 $email = "test@example.com";
 $password ="1234";

 if(isset($_POST['email'],$_POST['mot_de_passe'])){

    if($_POST['email'] === $email && $_POST['mot_de_passe'] === $password){

        $_SESSION['email'] = $_POST['email'];
        header('Location: profile.php');
        exit();

    }else{
        $error = 'Vos identifiants ne sont pas valides';
    }
 }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css">
    <title>Page de connexion</title>
</head>
<body>
    <div class="container">
    <?php if (!empty($error)) : ?>
                <div class="alert alert-danger mt-3">
                    <strong><?= $error ?></strong>
                </div>
     <?php endif; ?>
    <h2 class="text-center text-secondary mt-3">Formulaire de connexion</h2>
        <div class="row justify-content-center mt-5">
            <form action="connexion.php" method="POST" class="col-md-6">
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
