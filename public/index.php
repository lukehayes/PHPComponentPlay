<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use App\Controllers\TestController;

use App\App;
use App\Container;
use App\Service\TwigService as Twig;

// -------------------------------------------------
// Setup 
// -------------------------------------------------
//
// -------------------------------------------------
$container = new Container();
$app  = App::setContainer($container);
$twig = $container->getServiceInstance(Twig::class);

// -------------------------------------------------
// Routing 
// -------------------------------------------------
//
// -------------------------------------------------
// TODO Implement some kind of dynamic controller/action generation.
$controller = new TestController();

$path       = $controller->request->getPathInfo();
$method     = $controller->request->server->get('REQUEST_METHOD');

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
    // TODO Implement Authentication, validation etc.
    dump($controller->request);
    dd("Revieved POST request. Dying.");
}
