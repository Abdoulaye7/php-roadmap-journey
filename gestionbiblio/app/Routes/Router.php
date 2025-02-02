<?php
namespace App\Routes;

use AltoRouter;

class Router{
    private $viewPath;
    private $router;

    public function __construct(string $viewPath){

        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    public function get(string $method,string $url, string $view, ?string $name = null):self{

        $this->router->map($method,$url,$view,$name);

        return $this;

    }

    public function run(): self {
        $match = $this->router->match();
    
        if (!$match) {
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée.";
            return $this;
        }
    
        if (!isset($match['target']) || empty($match['target'])) {
            http_response_code(500);
            echo "Erreur 500 : Route mal configurée.";
            return $this;
        }
    
        $view = $match['target'];
        $viewFile = $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
    
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "Erreur 500 : Fichier de vue introuvable.";
            return $this;
        }
    
        require $viewFile;
        return $this;
    }
    

   /* public function run(): self {
        $match = $this->router->match();
    
        $view = $match['target'];
        $viewFile = $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
       // var_dump($viewFile);
    
    
        require $viewFile;
        return $this;
    }*/
    
   
}