<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\View;
use App\DB\SQLiteDatabase;
use App\DB\Query;

$request = Request::createFromGlobals();
$server  = $request->server;
$path    = $request->getPathInfo();
$query = new Query(new SQLiteDatabase("db"));

dump($query);
dump($query->selectAll("data"));


// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {

    if( $request->getMethod() == "GET")
    {
        // Load the contact form if its a GET request.
        $response = View::load('form');
    }else
    {
        // Process the input if POST.
        dump($request->request);
    }
} else if (in_array($path, ['/dashboard'])) {

    if( $request->getMethod() == "GET")
    {
        // Load the contact form if its a GET request.
        $response = View::load('form');
    }else
    {
        // Process the input if POST.
        dump($request->request);
    }

} else {
    $response = View::load('error');
}

//$resonse->setStatus(300);
// Output page to browser.
$response->send();



