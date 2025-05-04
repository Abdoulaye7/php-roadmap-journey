<?php

namespace App\Controllers;

class TestController extends Controller {
    public function getData() {
        // 🔥 Autoriser les requêtes depuis un autre domaine (CORS)
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Content-Security-Policy: default-src 'self'; connect-src *; script-src 'self' 'unsafe-inline';");

        
        // 🔥 Empêcher la mise en cache
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $data = [
            ['id' => 1, 'nom' => 'Famille 1'],
            ['id' => 2, 'nom' => 'Famille 2'],
            ['id' => 3, 'nom' => 'Famille 3'],
            ['id' => 4, 'nom' => 'Famille 4'],
            ['id' => 5, 'nom' => 'Famille 5'],
        ];
    
        // 🔥 S'assurer que le contenu est bien du JSON
        header('Content-Type: application/json');
        echo json_encode(["data" => $data]);
        exit;
    }
    
}