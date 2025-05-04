<?php
include __DIR__ . '/layout/menu.php';
?>

<div class="container mt-4">
    <h2>Ajouter un Projet</h2>
    
    <form id="formProjet">
        <div class="row">
            <!-- Colonne 1 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="num_projet" class="form-label">Numéro du projet</label>
                    <input type="text" class="form-control" id="num_projet" name="num_projet" required>
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du projet</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>
            </div>

            <!-- Colonne 2 -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_perimetre" class="form-label">Périmètre</label>
                    <select class="form-select" id="id_perimetre" name="id_perimetre" required>
                        
                        <!-- À remplir dynamiquement si besoin -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_type_chantier" class="form-label">Type de chantier</label>
                    <select class="form-select" id="id_type_chantier" name="id_type_chantier" required>
                        
                        <!-- À remplir dynamiquement si besoin -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_etat" class="form-label">État du projet</label>
                    <select class="form-select" id="id_etat" name="id_etat" required>
                        
                        <!-- À remplir dynamiquement si besoin -->
                    </select>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary" id="btnAjouterProjet">Ajouter</button>
        </div>
    </form>
</div>
<script src="/assets/js/project.js"></script>