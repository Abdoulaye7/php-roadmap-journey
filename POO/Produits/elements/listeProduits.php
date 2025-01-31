<?php
require_once '../class/Produit.php';
require_once '../class/ProduitManager.php';

// Initialisation du gestionnaire de produits
$produitManager = new ProduitManager(__DIR__ . '/../data/produits');
$produits = $produitManager->getProducts();
?>

<h1 class="mt-4">Liste des Produits</h1>

<?php if (!empty($produits)): ?>
    <div class="list-group">
        <?php foreach ($produits as $produit): ?>
            <div class="list-group-item">
                <?= $produit->toHTML() ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun produit disponible.</p>
<?php endif; ?>
