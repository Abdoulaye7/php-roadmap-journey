<!-- filepath: /c:/Users/Lenovo/Documents/gdpt_dev/app/Views/home.php -->
<?php include __DIR__ . '/layout/menu.php'; ?>

<h1><?= $message; ?></h1>

<div class="container">
    <h1>Gestion des familles HOME</h1>
    <table id="familleTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les lignes seront ajoutées dynamiquement par DataTables -->
        </tbody>
    </table>
</div>

<script src="/assets/js/Home.js"></script>
