<?php

namespace App\Models;

USE PDO;
USE PDOException;

define('HOST','localhost');
define('DBNAME','gdpt');
define('LOGIN','root');
define('PASSWORD','');
abstract class Model
{
   

    // Propriété qui contiendra l'instance de la connexion
	protected $_connexion;
	public function getConnection($host=HOST,$dbname=DBNAME,$login=LOGIN,$pass=PASSWORD){
		// On supprime la connexion précédente
		$this->_connexion = null;
		// On essaie de se connecter à la base
		try{
			$this->_connexion = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $pass, array(PDO::MYSQL_ATTR_LOCAL_INFILE => true));
			$this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			$this->_connexion->exec("set names utf8");
		}catch(PDOException $exception){
			echo "Erreur MariaDB : " . $exception->getMessage();
		}
	}

	public function getResults($sql="",$params=array()){
		try{
			$query = $this->_connexion->prepare($sql);
			$query->execute($params);
			return $query->fetchAll(PDO::FETCH_ASSOC); 
		}catch(PDOException $exception){
			echo "Erreur de MariaDB : " . $exception->getMessage();
		}
	}
	public function executeRequete($sql="",$params=array()){
		try{
			$query = $this->_connexion->prepare($sql);
			return $query->execute($params);
		}catch(PDOException $exception){
			echo "Erreur de MariaDB : " . $exception->getMessage();
		}
	}
	public function last_InsertID(){
		try{
			return $this->_connexion->lastInsertId(); 
		}catch(PDOException $exception){
			echo "Erreur de MariaDB : " . $exception->getMessage();
		}
	}
}