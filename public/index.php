<?php

// Start of project.

require '../vendor/autoload.php';

use App\View;
use App\DB\Query;
use App\DB\SQLiteDatabase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();
$server  = $request->server;
$path    = $request->getPathInfo();
$query = new Query(new SQLiteDatabase("db"));

$sesh = new Session();
$sesh->getFlashBag()->add('notice', 'A quick flash message');


// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {

    if( $request->getMethod() == "GET")
    {
        dump($sesh->getFlashBag()->get('notice'));
        // Load the contact form if its a GET request.
        $response = View::load('form');
    }else
    {
        // Process the input if POST.
        dump($request->request);
        die("Died");
        $response = new RedirectResponse('/contact');
    }
} else if (in_array($path, ['/dashboard'])) {
    $response = new Response('Showing Dashboard.');
} else {
    $response = View::load('error');
}

//$resonse->setStatus(300);
// Output page to browser.
$response->send();



