$(document).ready(function(){

    let table = $("#table-utilisateurs").DataTable();
   

    function afficheUsers()
    {
        $.ajax({
            url:"process.php?action=read",
            type:'GET',
            dataType: "json",
            success:function(data){
                table.clear();
                data.forEach(user => {
                    table.row.add([
                        user, 
                        `<button class='btn btn-danger btn-sm delete'  data-nom='${user}'>Supprimer</button>`
                    ]).draw();
                });

            },
        });
    }

  $('#myForm').submit(function(event){
    event.preventDefault();
    let name = $('#name').val();
   
    if (name === "") {
        Swal.fire("Erreur", "Veuillez entrer un nom", "error");
        return;
    }

    $.ajax({
        url:'process.php?action=create',
        type:'POST',
        data:{nom:name},
        success:function(response){
            Swal.fire("Succès", response, "success");
            $("#name").val("");
            afficheUsers();
        },
        error: function() {
            $("#response").html("Erreur lors de l'envoi des données.");
        }
        

    });

  });
  $("#table-utilisateurs tbody").on("click",'.delete',function(){
    let name = $('#name').val();
      console.log('cliked');
      Swal.fire({
        title: "êtes-vous sûr de vouloir supprimer?",
        text: "Cette action est irréversible",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Supprimer",
        denyButtonText: `Ne pas supprimer`
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url:"process.php?action=delete",
                type:"POST",
                data:{nom:name},
                success: function(response) {
                    Swal.fire("Supprimé", response, "success");
                    afficheUsers();
                }

            });
          
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });

  });


afficheUsers();

});