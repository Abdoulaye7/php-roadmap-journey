<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


define("PREFIXE_TABLE", "_gdpt_");

require_once __DIR__ . '/vendor/autoload.php';

// Inclure le menu de navigation
//include __DIR__ . '/app/Views/layout/menu.php';

use App\Controllers\HomeController;
use App\Controllers\TestController;

// Récupérer l'URL demandée
$requestUri = $_SERVER['REQUEST_URI'];

// Supprimer les éventuels paramètres de requête (tout ce qui suit "?")
$requestUri = strtok($requestUri, '?');

// Supprimer le slash initial et final
$requestUri = trim($requestUri, '/');

// Vérifier si l'URL est "getData" et appeler la méthode correspondante
if ($requestUri === 'getData') {
    $controller = new TestController();
    $controller->getData();
    exit;
}
// Vérifier si l'URL est "getData" et appeler la méthode correspondante
if ($requestUri === 'getData') {
    $controller = new TestController();
    $controller->getData();
    exit;
}


// Diviser l'URL en segments
$url = $requestUri !== '' ? explode('/', $requestUri) : ['home', 'index'];

/*echo '<pre>';
print_r($url);
echo '</pre>';*/

// Récupération du contrôleur et de l'action
$controllerName = ucfirst(strtolower($url[0])) . "Controller";
$action = isset($url[1]) ? $url[1] : 'index';

//echo "Controller: $controllerName, Action: $action<br>";

// Définition du namespace du contrôleur
$controllerClass = "App\\Controllers\\" . $controllerName;

//echo "Controller Class: $controllerClass<br>";

// Vérification de l'existence du contrôleur
if (!class_exists($controllerClass)) {
    http_response_code(404);
    echo "❌ ERREUR : Le contrôleur '$controllerClass' est introuvable !";
    exit;
}

$controller = new $controllerClass();

// Vérification de l'existence de la méthode
if (!method_exists($controller, $action)) {
    http_response_code(404);
    echo "❌ ERREUR : L'action '$action' n'existe pas dans '$controllerClass'!";
    exit;
}

call_user_func([$controller, $action]);
?>