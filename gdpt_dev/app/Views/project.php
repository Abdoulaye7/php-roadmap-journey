<?php
include __DIR__ . '/layout/menu.php';

?>

<div class="container">
<div class="d-flex align-items-center gap-3 mt-3">
    <a class="btn btn-primary" href="/project/add" role="button">Ajouter projet</a>
    <input type="search" id="searchInput" class="form-control w-auto" placeholder="Recherche projet" style="width: 250px;">
</div>

<table id="projects" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>N° project</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Perimetre</th>
                <th>chantier</th>
            </tr>
        </thead>
        <tbody>

        </tbody>

   
</div>
<script src="/assets/js/project.js"></script>