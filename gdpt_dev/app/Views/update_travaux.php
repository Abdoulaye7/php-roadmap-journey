<?php include __DIR__ . '/layout/menu.php'; ?>

<div class="container">
<form id="formTravaux">
   <div class="form-group">
        <label for="num_projet">Identifiant</label>
        <input type="text" id="id_travaux" name="id_travaux" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="num_projet">Numéro du projet</label>
        <input type="text" id="num_projet" name="num_projet" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_debut">Date de début</label>
        <input type="date" id="date_debut" name="date_debut" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_fin">Date de fin</label>
        <input type="date" id="date_fin" name="date_fin" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
</div>

<script src="/assets/js/travaux.js"></script>