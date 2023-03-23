<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controllers\TestController;
// use App\Request;

use App\App;
use App\Container;
use App\Service\TwigService;

// Setup -------------------------------------------
// -------------------------------------------------
$container = new Container();
$container->addService(TwigService::class);
$app  = App::setContainer($container);
$twig = App::get(TwigService::class);

$request    = Request::createFromGlobals();

// -------------------------------------------------


// Routing -----------------------------------------
// -------------------------------------------------

$controller = new TestController();
$path       = $request->getPathInfo();
$method     = $request->server->get('REQUEST_METHOD');

if($method === "GET")
{
    switch($path)
    {
        case "/":
            $controller->index()->send();
            break;
        case "/login":
            $controller->other()->send();
            break;
        default:
            $response = new Response("Error, 404.", 404);
            $response->send();
            break;
    }
}else 
{
    dd("Revieved POST request. Dying.");
}
