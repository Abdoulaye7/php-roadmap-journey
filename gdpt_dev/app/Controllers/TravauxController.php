<?php
namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\TravauxModel;

class TravauxController extends Controller{
    public function index (){
        $this->render('travaux',[]);
    }
    public function listTravaux(){
        $travaux = new TravauxModel();

        $data = $travaux->list();
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function add(){
        $this->render('add_travaux',[]);
    }
    public function update(){
        $this->render('update_travaux',[]);
    }
    public function addTravaux() {
    
    
        $travaux = new TravauxModel();
    
        $input = json_decode(file_get_contents("php://input"), true);

        $num_projet = $input['num_projet'] ?? null;
        $description = $input['description'] ?? null;
        $date_debut = $input['date_debut'] ?? null;
        $date_fin = $input['date_fin'] ?? null;
    
        $success = $travaux->add($num_projet, $description, $date_debut, $date_fin);
    
        if ($success) {
            header('Content-Type: application/json'); // Mettre ça AVANT tout output
            echo json_encode(["success" => true, "message" => "Travaux ajouté avec succès !"]);
        } else {
            header('Content-Type: application/json'); // Mettre ça AVANT tout output
            echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du travaux."]);
        }
    }
    public function getById(){
        $travaux = new TravauxModel();
        $id = $_GET['id'];
        $data = $travaux->getTravauxById($id);
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    public function getAllProjectNumbers(){
        $projet = new ProjectModel();

        $data = $projet->getAllProjectNumbers();

        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }

    public function updateTravaux(){
        $travaux = new TravauxModel();

        $input = json_decode(file_get_contents("php://input"),true);

        $id_travaux = $input['id_travaux'] ?? null;


        if (!$id_travaux) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'ID invalide ou manquant']);
            exit();
        }

        $num_projet = $input['num_projet'] ?? null;
        $description = $input['description'] ?? null;
        $date_debut = $input['date_debut'] ?? null;
        $date_fin = $input['date_fin'] ?? null;

        $success = $travaux->updateTravaux($id_travaux,$num_projet,$description,$date_debut,$date_debut);

        if ($success) {
            header('Content-Type: application/json');
            echo json_encode(["success" => true, "message" => "Travaux mis à jour avec succès"]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour des travaux"]);
        }

    }
}