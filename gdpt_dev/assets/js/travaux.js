

$(document).ready(function(){
    console.log('DOM chargé !');
    getTravaux();
    addTravaux();
    getOptions();

    var urlParams = new URLSearchParams(window.location.search);
    var id_travaux = urlParams.get('id'); 
    if(id_travaux){
        getTravauxDetails(id_travaux); 
    }
     updateTravaux();


    function getTravaux(){
        $.ajax({
            url:'http://localhost:8000/travaux/listTravaux',
            type:'GET',
            success:function(response){
                console.log(response.data);
                $("#travaux").DataTable({
                    data:response.data,
                    destroy: true, 
                    columns:[
                        {data:"num_projet"},
                        {data:"description"},
                        {data:"date_debut"},
                        {data:"date_fin"},
                        {
                            // Ajouter une colonne d'actions avec le bouton "Modifier projet"
                            render: function(data, type, row) {
                                return `<a class="btn btn-success  btn-sm" href="/travaux/update?id=${row.id}" role="button">Modifier travaux</a>`;
                            }
                        }
                    ]

                });
            },
            error:function(xhr,status,error){
                console.log("Erreur ajax : ",error);
            }
        });
    }
    function addTravaux(){
        $("#formTravaux").on('submit',function(e){
            e.preventDefault();
           

              data = {
                num_projet: $("#num_projet").val(),
                description: $("#description").val(),
                date_debut : $("#date_debut").val(),
                date_fin   : $("#date_fin").val()
            };
            
            console.log("Données envoyées :", data);

            $.ajax({
                url:'http://localhost:8000/travaux/addTravaux',
                type:'POST',
                data: JSON.stringify(data),
                contentType: 'application/json', // Important !
                dataType: 'json',
                success: function(response) {
                    console.log("Réponse serveur :", response);
                
                    Swal.fire({
                        title: response.success === true ? "Succès" : "Erreur",
                        text: response.message,
                        icon: response.success === true ? "success" : "error"
                    });
                
                    if (response.success === true) {
                        getTravaux();
                        $("#formTravaux")[0].reset();
                    }
                },
                
                error:function(xhr,status,error){
                    console.log("Erreur ajax : ",error);
                }

            });

        });
    }
    function getTravauxDetails(id_travaux){
        $.ajax({
            url:'http://localhost:8000/travaux/getById',
            type:'GET',
            data:{id:id_travaux},
            success:function(response){
                if (response.data  && response.data.length > 0) {
                    const travail = response.data[0];
                    $("#id_travaux").val(travail.id);
                    $("#num_projet").val(travail.num_projet);
                    $("#description").val(travail.description);
                    $("#date_debut").val(travail.date_debut);
                    $("#date_fin").val(travail.date_fin);
                }
            },
            error:function(xhr,status,error){
                console.log("Erreur ajax :",error);
            }
        })
    }
     function updateTravaux(){
      $("#formTravaux").on('submit', function(e){
            e.preventDefault();
        var data ={
            id_travaux: $("#id_travaux").val(), 
            num_projet: $("#num_projet").val(),
            description: $("#description").val(),
            date_debut: $("#date_debut").val(),
            date_fin: $("#date_fin").val()
        }
        $.ajax({
            url:'http://localhost:8000/travaux/updateTravaux',
            type:'POST',
            data:JSON.stringify(data),
            contentType:'application/json',
            dataType:'json',
            success:function(response){
                if (response.success) {
                    Swal.fire({
                        title: "Succès",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                     
                        window.location.href = '/travaux'; 
                    });
                } else {
                    Swal.fire({
                        title: "Erreur",
                        text: response.message,
                        icon: "error"
                    });
                }

            },
            error:function(xhr,status,error){

            }
        });
     });
    }
    function getOptions(num_projet=null){
        $.ajax({
            url:'http://localhost:8000/travaux/getAllProjectNumbers',
            type:'GET',
            success:function(response){
                console.log(response.data);
                if(response.data && Array.isArray(response.data)){
                    let options = '<option value="">-- Sélectionner --</option>';
                    response.data.forEach(function(projet){
                        options += `<option value="${projet.num_projet}">${projet.num_projet}</option>`;

                    });
                    $('#num_projet').html(options);
                }
            }

        })
    }

});