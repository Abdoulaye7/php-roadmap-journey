<?php include __DIR__ . '/layout/menu.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Ajout Travaux</h2>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <form id="formTravaux">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                </div>

                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                </div>

                <div class="mb-3">
                    <label for="num_projet" class="form-label">Numéro du projet</label>
                    <select class="form-select" id="num_projet" name="num_projet" required>
                        <!-- Options dynamiques -->
                    </select>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary" id="btnAjouterProjet">Ajouter</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/assets/js/travaux.js"></script>