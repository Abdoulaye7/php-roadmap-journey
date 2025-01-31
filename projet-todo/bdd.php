<?php

try{

    $connexion = new PDO('mysql:host=localhost;dbname=todo_app', 'root', '',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
   


}catch(Exception $e){
    echo $e->getMessage();
}