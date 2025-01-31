<?php
require 'bdd.php';
require 'header.php';

$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['mot_de_passe'] ?? '';

$success = false;
$errors = [];

 if(empty($nom)){
    $errors ['nom'] = 'Le nom est obligatoire';
 }elseif(strlen($nom) < 4){
    $errors ['nom'] = 'Le nom doit comporter 4 caractères minimun';
 }
 if(empty($email)){
    $errors ['email'] = 'L\'email est obligatoire';
 }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors ['email'] = 'L\'eamil est incorrecte';
 }
 if(empty($password)){
    $errors ['mot_de_passe'] = 'Le mot de passe est obligatoire';
 }elseif(strlen($password) < 4){
    $errors ['mot_de_passe'] = 'Le mot de passe doit comporter 4 caractères minimun';
 }

 $passwordhashed = password_hash($password,PASSWORD_BCRYPT);

 if(empty($errors)){

   try{
     //verification si email existe 
     $stmt = $connexion->prepare("SELECT id FROM utilisateurs WHERE email = :email");
     $stmt->bindParam('email',$email);
      $stmt->execute();
     if($stmt->rowCount() > 0){
         $errors [] = 'L\'email existe déjà';
     }else{
        //Insertion en base de données
     $stmt = $connexion->prepare("INSERT INTO utilisateurs(nom,email,mot_de_passe) VALUES(:nom,:email,:mot_de_passe)");
     $stmt->bindParam('nom',$nom);
     $stmt->bindParam('email',$email);
     $stmt->bindParam('mot_de_passe',$passwordhashed);
 
     $stmt->execute();
 
     $success = true;
 
     //header('Location: connexion.php');
     //exit(); // Terminer le s
 
 
 

     }
 
     
 }catch(PDOException $e){
    //$errors[] = 'Une erreur est survenue lors de l\'inscription : ' ;
   }
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
<?php if ($success) : ?>
        <div class="alert alert-success mt-4">
            Utilisateur ajouté avec succès !
        </div>
    <?php endif ?>
<h2 class="text-center text-secondary mt-3">Formulaire d'inscription</h2>
        <div class="row justify-content-center mt-5">
            <form action="inscription.php" method="POST" class="col-md-6">
            <div class="form-group">
                    <label for="email">Nom :</label>
                    <input type="text" value="<?= isset($nom) ? htmlentities($nom) : '' ?>" class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>" name="nom" >
                    <?php if (isset($errors['nom'])) : ?>
                        <div class="invalid-feedback"><?= $errors['nom'] ?></div>
                    <?php endif ?>
                </div>
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
                <button type="submit" class="btn btn-primary btn-block mt-3">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

