$(document).ready(function () {
    console.log('Famille.js chargé');

    // Données fictives pour le test
    var dataFictives = [
        { id: 1, libelle: 'Famille 1' },
        { id: 2, libelle: 'Famille 2' },
        { id: 3, libelle: 'Famille 3' },
        { id: 4, libelle: 'Famille 4' },
        { id: 5, libelle: 'Famille 5' }
    ];

    $('#familleTable').DataTable({
        data: dataFictives,
        columns: [
            { data: 'id', title: 'ID' },
            { data: 'libelle', title: 'Libellé' },
            {
                data: null,
                title: 'Actions',
                render: function (data, type, row) {
                    return '<button class="btn btn-primary">Action</button>';
                }
            }
        ]
    });
});