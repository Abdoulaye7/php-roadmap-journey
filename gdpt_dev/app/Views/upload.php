<?php include __DIR__ . '/layout/menu.php'; ?>

<div class="container">
    <h1>Importer un fichier CSV</h1>
    
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form action="/upload/handleUpload" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="csv_file" class="form-label">Sélectionnez un fichier CSV</label>
            <input type="file" name="csv_file" id="csv_file" class="form-control" accept=".csv" required>
        </div>
        <button type="submit" class="btn btn-primary">Importer</button>
    </form>
</div>
