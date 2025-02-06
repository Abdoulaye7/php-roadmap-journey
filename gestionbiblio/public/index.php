<?php

use App\Routes\Router;

require '../vendor/autoload.php';

// Définis le basePath en fonction de la structure de ton projet
$basePath = '/tutophp/php-roadmap-journey/gestionbiblio/public';


$router = new Router(dirname(__DIR__) . '/app/Views', $basePath);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//throw new Exception('Test de Whoops');

    $router
    ->get('GET','/books', '/book/index', 'biblio_index')
    ->get('GET','/books/[i:id]','/book/show','biblio_show')

    ->get('GET', '/books/add', '/book/add', 'biblio_add')
    ->get('POST', '/books/add', '/book/store', 'biblio_store')

    ->get('GET', '/books/edit/[i:id]', '/book/edit', 'biblio_edit') 
    ->get('POST', '/books/update/[i:id]', '/book/update', 'biblio_update')
    ->run();

