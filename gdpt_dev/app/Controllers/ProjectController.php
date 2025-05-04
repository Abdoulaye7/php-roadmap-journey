<?php

namespace App\Controllers;

use App\Models\ProjectModel;


class ProjectController extends Controller{
   
    public function index()
    { 
           $this->render('project',[]);
    }
    public function getListProjects()
    {
        $project = new ProjectModel();
        $data = $project->getProjects();
        
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function add (){
        $this->render('add_project',[]);
    }
    public function update(){

        $this->render('update_project', []);
    }
    public function getProjectByNum(){
        $project = new ProjectModel();

        $num_projet = $_GET['num_projet'];

        $data = $project->getProjectByNum($num_projet);

        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function updateProjectPost() {
        $project = new ProjectModel();
    
        // Récupérer les données envoyées par le formulaire
        $num_projet = $_POST['num_projet'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $id_perimetre = $_POST['id_perimetre'];
        $id_type_chantier = $_POST['id_type_chantier'];
        $id_etat = $_POST['id_etat'];
    
        // Effectuer la mise à jour du projet
        $success = $project->updateProject($num_projet, $nom, $description, $id_perimetre, $id_type_chantier, $id_etat);
    
        if ($success) {
            header('Content-Type: application/json');
            // Rediriger ou afficher un message de succès
            echo json_encode(["success" => true, "message" => "Le projet a été mis à jour avec succès."]);
        } else {
            header('Content-Type: application/json');
            // Si la mise à jour échoue
            echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour du projet."]);
        }
    }
    

    public function addProject(){
        $project = new ProjectModel();

        $num_projet  = $_POST['num_projet'];
        $nom         = $_POST['nom'];
        $description = $_POST['description'];
        $id_perimetre   = $_POST['id_perimetre'];
        $id_type_chantier = $_POST['id_type_chantier'];
        $id_etat        = $_POST['id_etat'];
      



        $success = $project->addProejct($num_projet,$nom,$description,$id_perimetre,$id_type_chantier,$id_etat);

        if ($success) {
            header('Content-Type: application/json');
            echo json_encode(["success" => true, "message" => "Le projet a été ajouté avec succès !"]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du projet."]);
        }
    }
    public function getListPerimetre(){
        $project = new ProjectModel();
        $data = $project->getPerimetre();

        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function getListChantier(){
        $project = new ProjectModel();
        $data = $project->getChantier();
        
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function getListEtat(){
        $project = new ProjectModel();
        $data = $project->getEtat();
        
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    
}