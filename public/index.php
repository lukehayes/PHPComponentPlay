<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use App\Controllers\TestController;

use App\App;
use App\Container;
use App\Service\TwigService as Twig;
use App\Service\DatabaseService as DB;
use App\Routing\Router;
use App\Routing\Route;

$router = new Router();
$router->get(new Route('home','/', TestController::class, 'index'));
$router->get(new Route('login','/login', TestController::class, 'login'));

$router->post(new Route('login','/login', TestController::class, 'login'));

// -------------------------------------------------
// Setup
// -------------------------------------------------
//
// -------------------------------------------------
$container = new Container();
$app  = App::setContainer($container);

// -------------------------------------------------
// Routing 
// -------------------------------------------------
//
// -------------------------------------------------
$router->resolveRoute();
