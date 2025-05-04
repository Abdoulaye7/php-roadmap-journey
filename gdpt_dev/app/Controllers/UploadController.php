<?php

namespace App\Controllers;

use App\Models\UploadModel;

class UploadController extends Controller
{
    public function index()
    {
        $this->render('upload'); // Charge la vue upload.php
    }

    public function handleUpload()
    {
        if (isset($_FILES['csv_file'])) {
            $uploadModel = new UploadModel();
            $filePath = $uploadModel->uploadFile($_FILES['csv_file']);

            if (file_exists($filePath)) {
                $message = $uploadModel->importCSVToDatabase($filePath);
            } else {
                $message = "❌ Échec du téléchargement.";
            }
        } else {
            $message = "❌ Aucun fichier sélectionné.";
        }

        $this->render('upload', ['message' => $message]);
    }
}
