<?php

use App\Routes\Router;

require '../vendor/autoload.php';


$router = new Router(dirname(__DIR__). '/app/Views');


$router
    ->get('/Biblio/livre', 'Biblio/livre/index', 'biblio_livre')
    ->run();


?>