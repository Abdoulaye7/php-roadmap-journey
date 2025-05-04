<?php

namespace App\Models;

use PDO;
use PDOException;

class UploadModel extends Model
{
    private $table = "_gdpt_famille"; // ✅ Table mise à jour

    public function __construct()
    {
        $this->getConnection(); // Connexion automatique à la BD
    }

    /**
     * Vérifie et sauvegarde le fichier CSV sur le serveur
     */
    public function uploadFile($file)
    {
        // Vérification du type de fichier
        $fileType = pathinfo($file['name'], PATHINFO_EXTENSION);
        var_dump($fileType);
        if ($fileType !== 'csv') {
            return "❌ Erreur : Seuls les fichiers CSV sont autorisés.";
        }

        // Déplacer le fichier vers un dossier sur le serveur
        $uploadDir = __DIR__ . '/../../public/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Créer le dossier s'il n'existe pas
        }

        $filePath = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $filePath; // Retourne le chemin du fichier enregistré
        } else {
            return "❌ Erreur lors de l'envoi du fichier.";
        }
    }

    /**
     * Lit le fichier CSV et insère les données en BD
     */
    public function importCSVToDatabase($filePath)
    {
        try {
            $handle = fopen($filePath, "r");
            if ($handle === false) {
                return "❌ Impossible d'ouvrir le fichier.";
            }
    
            $rowCount = 0;
            while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                var_dump($data);
                if (count($data) < 2) {
                    continue; // Ignore les lignes incomplètes
                }
    
                $id = $data[0];
                $libelle = $data[1];
    
                if (empty($id) || empty($libelle)) {
                    continue;
                }
    
                $sql = "INSERT INTO _gdpt_famille (id, libelle) VALUES (:id, :libelle) 
                        ON DUPLICATE KEY UPDATE libelle = VALUES(libelle)";
                $this->executeRequete($sql, [
                    ':id' => $id,
                    ':libelle' => $libelle
                ]);
    
                $rowCount++;
            }
    
            fclose($handle);
            return "✅ Importation terminée. $rowCount lignes insérées ou mises à jour.";
        } catch (PDOException $exception) {
            return "❌ Erreur d'importation : " . $exception->getMessage();
        }
    }
    

}
