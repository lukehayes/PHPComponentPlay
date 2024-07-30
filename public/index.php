<?php

// Start of project.

require '../vendor/autoload.php';

use App\Controllers\TestController;

use App\App;
use App\Routing\Route;
use App\DB\SQLiteDatabase;
use App\DB\Query;

// -------------------------------------------------
// Setup
// -------------------------------------------------
$app = new App();
App::setContainer(new \App\Container());

$db = new SQLiteDatabase();
$q = new Query($db);

dump($q);


// -------------------------------------------------
// Add Routes
// -------------------------------------------------
$router = App::get('Router');


// TODO Implmement support for different kinds of actions
// like classes, callback functions etc.
$router->get(new Route('home','/', TestController::class, 'index', 'GET'));
$router->get(new Route('contact','/contact', TestController::class, 'other', 'GET'));
$router->get(new Route('login','/login', TestController::class, 'login', 'GET'));
$router->post(new Route('login','/login', TestController::class, 'login', 'POST'));

// -------------------------------------------------
// Routing 
// -------------------------------------------------
$router->resolveRoute();
