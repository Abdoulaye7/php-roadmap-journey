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
    
        $view = $match['target'];
        $viewFile = $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
       // var_dump($viewFile);
    
    
        require $viewFile;
        return $this;
    }
    
   
}