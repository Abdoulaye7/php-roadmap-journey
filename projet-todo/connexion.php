<?php
session_start();

require 'bdd.php';
require 'header.php';

$email = $_POST['email'] ?? '';
$password = $_POST['mot_de_passe'] ?? '';
$success = false;
$errors = [];

$stmt = $connexion->prepare('SELECT * FROM utilisateurs WHERE email =:email');
$stmt->bindParam('email',$email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password,$user['mot_de_passe'])){
    //$success = true;
    $_SESSION['nom'] = $user['nom'];

    header('Location: dashboard.php');
    exit();
    
} else {
    // Erreur : mot de passe incorrect ou email non trouvé
    $errors['login'] = 'Email ou mot de passe incorrect';
}

?>

<div class="container">
<?php if (!empty($errors)) : ?>
    <?php foreach($errors as $error) : ?>
        <div class="alert alert-danger mt-3">
          <?= $error ?>
        </div>
        <?php endforeach; ?>
    <?php endif ?>
    
</div>
<h2 class="text-center text-secondary mt-3">Formulaire de connexion</h2>
        <div class="row justify-content-center mt-5">
            <form action="connexion.php" method="POST" class="col-md-6">
            <div class="form-group">
                    
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" value="<?= isset($email) ? htmlentities($email) : '' ?>"   class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" >
                    <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback"><?= $errors['email'] ?></div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" class="form-control <?= isset($errors['mot_de_passe']) ? 'is-invalid' : '' ?>" name="mot_de_passe" >
                    <?php if (isset($errors['mot_de_passe'])) : ?>
                        <div class="invalid-feedback"><?= $errors['mot_de_passe'] ?></div>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Se connecter</button>
            </form>
        </div>
    </div>
</div>

