<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use App\Controllers\TestController;
use App\Request;

$request    = new Request();

$controller = new TestController();
$path       = $request->current->getPathInfo();
$method     = $request->current->server->get('REQUEST_METHOD');

// Routing -----------------------------------------
// -------------------------------------------------

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
