<?php

require '../vendor/autoload.php';

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\View\View;
use Src\Controllers\MainController;

ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'docker');
ORM::configure('password', 'docker');

session_start();

$router = Router::create();
$router->setupView('../views');

$router->get('/',[MainController::class,'indexPage']);
$router->get('/detail-page', [MainController::class, 'detailPage']);
$router->get('/detail-page/{id}', [MainController::class, 'detailPage']);

$router->dispatch();