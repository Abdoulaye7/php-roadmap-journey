<?php
namespace App\Models;
use App\Models\Model;

 class ProjectModel extends Model{
    public function __construct()
    {
        $this->getConnection(); 
    }

    public function getProjects(){
        $query = "SELECT p.num_projet as num_projet,
        p.nom as nom,
        p.description as description,
        po.libelle as perimetre,
        tc.libelle as chantier
        FROM  _gdpt_projet as p
        INNER JOIN _gdpt_perimetres_organisationnelles as po ON  p.id_perimetre = po.id
        INNER JOIN _gdpt_type_chantier as tc ON p.id_type_chantier = tc.id
        ";

        return $this->getResults($query);
    }

    public function addProejct ($num_projet, $nom, $description,$id_perimetre,$id_type_chantier,$id_etat){
        $query = "INSERT INTO _gdpt_projet (num_projet, nom, description, id_perimetre, id_type_chantier, id_etat) 
        VALUES (:num_projet, :nom, :description, :id_perimetre, :id_type_chantier, :id_etat)";

        $params = [
            ':num_projet' => $num_projet,
            ':nom' => $nom,
            ':description' => $description,
            ':id_perimetre' => $id_perimetre,
            ':id_type_chantier' => $id_type_chantier,
            ':id_etat' => $id_etat
        ];


       return  $this->executeRequete($query,$params);
    }
    
    public function getProjectByNum($num_project){
        $query ="SELECT * from _gdpt_projet WHERE num_projet = ?";
        return $this->getResults($query,[$num_project]);
    }
    public function updateProject($num_projet, $nom, $description, $id_perimetre, $id_type_chantier, $id_etat) {
        $query = "UPDATE _gdpt_projet 
                  SET nom = ?, description = ?, id_perimetre = ?, id_type_chantier = ?, id_etat = ? 
                  WHERE num_projet = ?";
        // Exécuter la requête de mise à jour
        return $this->executeRequete($query, [$nom, $description, $id_perimetre, $id_type_chantier, $id_etat, $num_projet]);
    }

    public function getAllProjectNumbers(){

        $sql = "SELECT num_projet FROM _gdpt_projet ORDER BY num_projet";
        return  $this->getResults($sql,[]);
    }
    
    public function getPerimetre(){
        $query = "SELECT id, libelle FROM _gdpt_perimetres_organisationnelles";
        return $this->getResults($query);
    }
    public function getChantier(){
        $query =" SELECT id,libelle FROM _gdpt_type_chantier";
        return $this->getResults($query);
    }
    public function getEtat(){
        $query = "SELECT id,libelle FROM _gdpt_etat";
        return $this->getResults($query);
    }

}