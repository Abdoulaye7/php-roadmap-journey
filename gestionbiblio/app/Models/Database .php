<?php
namespace APP\Models;

use PDO;
use PDOException;

class Database {

    private static $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            try{
                self::$instance = new PDO("mysql:host=localhost;dbname=biblio_livre", "root", "", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);

            }catch(PDOException $e){
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }

}