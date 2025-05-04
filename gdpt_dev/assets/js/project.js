$(document).ready(function() {
    console.log("Dom prêt !");
    let table; 
    $('#searchInput').on('keyup', function () {
        table.search(this.value).draw();
    });
    getData();
    loadSelectOptions();

    addProject();


    var urlParams = new URLSearchParams(window.location.search);
    var num_projet = urlParams.get('num_projet'); 
    if(num_projet){
        getProjectDetails(num_projet); 
    }
    updateProject();

    function getData() {
        $.ajax({
            url: 'http://localhost:8000/project/getListProjects',
            type: 'GET',
            success: function(response) {
                console.log(response.data);

                 table= $("#projects").DataTable({
                    data: response.data,
            
                    destroy: true, // Important si tu veux pouvoir réinitialiser
                    columns: [
                        { data: "num_projet" },
                        { data: "nom" },
                        { data: "description" },
                        { data: "perimetre" },
                        { data: "chantier" },
                        {
                            // Ajouter une colonne d'actions avec le bouton "Modifier projet"
                            render: function(data, type, row) {
                                return `<a class="btn btn-success" href="/project/update?num_projet=${row.num_projet}" role="button">Modifier projet</a>`;
                            }
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.log("Erreur :", error);
            }
        });
    }
    function showMessage(success, message) {
        console.log("Success:", success);  // Affiche le succès dans la console
        console.log("Message:", message); 
        Swal.fire({
            icon: success ? 'success' : 'error',
            title: success ? 'Succès' : 'Erreur',
            text: message,
            confirmButtonText: 'OK'
        });
    }
    
    
    function addProject(){
        $('#formProjet').on('submit', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page
            loadSelectOptions();
    
        
        data = {
            num_projet: $("#num_projet").val(),
            nom       : $("#nom").val(),
            description: $("#description").val(),
            id_perimetre : $("#id_perimetre").val(),
            id_type_chantier :  $("#id_type_chantier").val(),
            id_etat   : $("#id_etat").val()
        };
        
        console.log("Données envoyées :", data);

        $.ajax({
            url: 'http://localhost:8000/project/addProject',
            type:'POST',
            data:data,
            success:function(response){
                console.log(response);
                showMessage(response.success === true, response.message);
                if (response.success) {
                    getData();
                    $('#formProjet')[0].reset(); // Réinitialise le formulaire
                }

            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX :", error);
            }

        });
    });
  }
  function getProjectDetails(num_projet) {
    $.ajax({
        url: 'http://localhost:8000/project/getProjectByNum', 
        type: 'GET',
        data: { num_projet: num_projet }, 
        success: function(response) {
            console.log("Données projets récupéré :", response); 
            if (response.data  && response.data.length > 0) {
                var projectData = response.data[0];
                // Remplir les champs du formulaire avec les données récupérées
                $('#num_projet').val(projectData.num_projet);
                $('#nom').val(projectData.nom);
                $('#description').val(projectData.description);
                $('#id_perimetre').val(projectData.id_perimetre);
                $('#id_type_chantier').val(projectData.id_type_chantier);
                $('#id_etat').val(projectData.id_etat);

                loadSelectOptions(projectData.id_perimetre, projectData.id_type_chantier, projectData.id_etat);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Le projet n\'a pas été trouvé.',
                });
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur AJAX :", error);
        }
    });
}

  function updateProject() {
    $('#formProjet').on('submit', function(e) {
        e.preventDefault(); // Empêcher le rechargement de la page

        // Récupérer les données du formulaire
        var data = {
            num_projet: $('#num_projet').val(),
            nom: $('#nom').val(),
            description: $('#description').val(),
            id_perimetre: $('#id_perimetre').val(),
            id_type_chantier: $('#id_type_chantier').val(),
            id_etat: $('#id_etat').val()
        };

        $.ajax({
            url: 'http://localhost:8000/project/updateProjectPost',
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: 'Le projet a été mis à jour avec succès.',
                    }).then(() => {
                     
                        window.location.href = '/project'; 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: response.message,
                    });
                }
               
            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX :", error);
            }
        });
    });
}

function loadSelectOptions(id_perimetre=null, id_type_chantier=null, id_etat=null) {
   
        
        $.ajax({
            url: 'http://localhost:8000/project/getListPerimetre',
            type:'GET',
            success:function(response){
               console.log(response);
               if (response.data && Array.isArray(response.data)) {
                let options = '<option value="">-- Sélectionner --</option>';
                response.data.forEach(function(perimetre) {
                    options += `<option value="${perimetre.id}">${perimetre.libelle}</option>`;
                });
                $('#id_perimetre').html(options);
            }

            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX :", error);
            }

        });

    
  
        
        $.ajax({
            url: 'http://localhost:8000/project/getListChantier',
            type:'GET',
            success:function(response){
               console.log(response);
               if (response.data && Array.isArray(response.data)) {
                let options = '<option value="">-- Sélectionner --</option>';
                response.data.forEach(function(chantier) {
                    options += `<option value="${chantier.id}">${chantier.libelle}</option>`;
                });
                $('#id_type_chantier').html(options);
            }

            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX :", error);
            }

        });

    
        
        $.ajax({
            url: 'http://localhost:8000/project/getListEtat',
            type:'GET',
            success:function(response){
               console.log(response);
               if (response.data && Array.isArray(response.data)) {
                let options = '<option value="">-- Sélectionner --</option>';
                response.data.forEach(function(etat) {
                    options += `<option value="${etat.id}">${etat.libelle}</option>`;
                });
                $('#id_etat').html(options);
            }

            },
            error: function(xhr, status, error) {
                console.log("Erreur AJAX :", error);
            }

        });

    
}
    
});
