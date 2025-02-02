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

    public function get(string $url, string $view, ?string $name = null):self{

        $this->router->map('GET',$url,$view,$name);

        return $this;

    }

    public function run(): self {
        $match = $this->router->match();
      
    
        if (!$match) {
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée.";
            return $this;
        }
    
        $view = $match['target'];
        $viewFile = $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
        var_dump($viewFile);
    
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "Erreur 500 : Fichier de vue introuvable : " . $viewFile;
            return $this;
        }
    
        require $viewFile;
        return $this;
    }
    
   
}