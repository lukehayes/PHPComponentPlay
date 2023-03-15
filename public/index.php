<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Session\Session;

use App\Controllers\TestController;

$request    = Request::createFromGlobals();
$controller = new TestController();
$path       = $request->getPathInfo();
$method     = $request->server->get('REQUEST_METHOD');

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
