<?php

// Start of project.

require '../vendor/autoload.php';

use App\Controllers\TestController;

use App\App;
use App\Routing\Route;

// -------------------------------------------------
// Setup
// -------------------------------------------------
$app = new App();
App::setContainer(new \App\Container());

// -------------------------------------------------
// Add Routes
// -------------------------------------------------
$router = App::get('Router');

// TODO Implmement support for different kinds of actions
// like classes, callback functions etc.
$router->get(new Route('home','/', TestController::class, 'index'));
$router->get(new Route('login','/login', TestController::class, 'login'));
$router->post(new Route('login','/login', TestController::class, 'login'));


// -------------------------------------------------
// Routing 
// -------------------------------------------------
$router->resolveRoute();
