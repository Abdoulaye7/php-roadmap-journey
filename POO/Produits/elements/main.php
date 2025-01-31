<?php
require '../class/Produit.php';
require '../class/ProduitManager.php';

$errors = [];
$success = false;
$produitManager = new ProduitManager(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'produits');
$produits = $produitManager->getProducts();

if (isset($_POST['nom'], $_POST['prix'], $_POST['description'])) {
    $produit = new Produit($_POST['nom'], (float)$_POST['prix'], $_POST['description']);

    if ($produit->isValid()) {
        $produitManager->addProduct($produit);
        $success = true;
        $_POST = [];
    } else {
        $errors = $produit->getErrors();
    }
}

require 'header.php';
?>

<div class="container py-4">
    <h1 class="text-center text-primary">Gestion des Produits</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalide. Veuillez corriger les erreurs.
        </div>
    <?php endif ?>

    <?php if ($success) : ?>
        <div class="alert alert-success">
            Produit ajouté avec succès !
        </div>
    <?php endif ?>

    <!-- Formulaire -->
    <div class="card shadow-sm p-4">
        <h2 class="h4 text-secondary text-center">Ajouter un Produit</h2>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-4">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>" 
                           value="<?= isset($_POST['nom']) ? htmlentities($_POST['nom']) : '' ?>">
                    <?php if (isset($errors['nom'])) : ?>
                        <div class="invalid-feedback"><?= $errors['nom'] ?></div>
                    <?php endif ?>
                </div>

                <div class="col-md-4">
                    <label for="prix" class="form-label">Prix (€)</label>
                    <input type="number" step="0.01" name="prix" class="form-control <?= isset($errors['prix']) ? 'is-invalid' : '' ?>" 
                           value="<?= isset($_POST['prix']) ? htmlentities($_POST['prix']) : '' ?>">
                    <?php if (isset($errors['prix'])) : ?>
                        <div class="invalid-feedback"><?= $errors['prix'] ?></div>
                    <?php endif ?>
                </div>

                <div class="col-md-4">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" 
                           value="<?= isset($_POST['description']) ? htmlentities($_POST['description']) : '' ?>">
                    <?php if (isset($errors['description'])) : ?>
                        <div class="invalid-feedback"><?= $errors['description'] ?></div>
                    <?php endif ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary px-4">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Liste des Produits -->
    <h2 class="mt-5 text-secondary">Vos Produits</h2>
    
    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" id="search" placeholder="Rechercher un produit..." onkeyup="filterProducts()">
    </div>

    <div class="row" id="product-list">
        <?php foreach ($produits as $produit) : ?>
            <div class="col-md-4 product-card">
                <div class="card shadow-sm p-3 mb-4">
                    <h5 class="card-title"><?= htmlentities($produit->getNom()) ?></h5>
                    <p class="card-text text-muted"><?= htmlentities($produit->getDescription()) ?></p>
                    <span class="badge bg-primary">Prix: <?= htmlentities($produit->getPrix()) ?> €</span>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
function filterProducts() {
    let input = document.getElementById("search").value.toLowerCase();
    let cards = document.getElementsByClassName("product-card");

    for (let card of cards) {
        let title = card.getElementsByClassName("card-title")[0].innerText.toLowerCase();
        if (title.includes(input)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    }
}
</script>

<?php require 'footer.php'; ?>
