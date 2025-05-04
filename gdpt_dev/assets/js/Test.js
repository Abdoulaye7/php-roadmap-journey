$(document).ready(function () {
    console.log("🚀 Chargement de DataTables...");

    $('#familleTable').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": "http://localhost:8000/test/getData", // Assurez-vous que c'est exactement ce que votre routeur attend
            "type": "GET",
            "dataSrc": "data",
            "error": function (xhr, status, error) {
                console.error("❌ Erreur AJAX :", error);
                console.log("Réponse complète :", xhr.responseText);
            }
        },
        "columns": [
            { "data": "id", "title": "ID" },
            { "data": "nom", "title": "Nom" },
            {
                "data": null,
                "title": "Actions",
                "render": function (data, type, row) {
                    return '<button class="btn btn-primary">Action</button>';
                }
            }
        ]
    });
});
