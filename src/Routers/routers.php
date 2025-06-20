<?php
namespace App\Routers;
use App\Routers\Router;

$router = new Router();

$router->add('GET', '/supplier', 'SupplierController@index');

$router->handleRequest();