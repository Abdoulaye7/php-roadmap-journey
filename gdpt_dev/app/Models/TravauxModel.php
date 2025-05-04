<?php
namespace App\Models;

class TravauxModel extends Model{
    public function __construct(){
        $this->getConnection();
    }
   public function list(){
    $query = "SELECT * FROM _gdpt_travaux";
    return $this->getResults($query,[]);
   }
   public function add($num_projet,$description,$date_debut,$date_fin){
     $query = "INSERT INTO _gdpt_travaux (num_projet,description,date_debut,date_fin)
      VALUES(:num_projet,:description,:date_debut,:date_fin)
     ";

     $params = [
        ':num_projet' =>$num_projet,
        ':description'=>$description,
        ':date_debut'=>$date_debut,
        ':date_fin'=>$date_fin
     ];
     
     return $this->executeRequete($query,$params);
   }
   public function getTravauxById($id){
      $query = "SELECT * FROM _gdpt_travaux WHERE id= ?";
      return $this->getResults($query,[$id]);
   }
   public function updateTravaux($id,$num_projet,$description,$date_debut,$date_fin){
      $query ="UPDATE  _gdpt_travaux
               SET num_projet = ?, description = ?, date_debut = ?, date_fin = ?
               WHERE id = ?";

      return $this->executeRequete($query, [$num_projet, $description, $date_debut, $date_fin, $id]);
   }
}