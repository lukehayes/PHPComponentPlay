<?php

// Start of project.

require '../vendor/autoload.php';

// use App\View;
// use App\DB\Query;
// use App\DB\SQLiteDatabase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Route;

$routes = [
    new Route("/", "Site", "index"),
    new Route("/other", "Site", "other"),
];


$request = Request::createFromGlobals();
$server  = $request->server;
$path    = $request->getPathInfo();

$session = new Session();

switch($path)
{
    case "/":
        $response = new Response("/");
        break;
    case "/other":
        $response = new Response("/other");
        break;
    default:
        $response = new Response("Error, 404.", 404);
        break;

}

// dump($response);

$response->send();



