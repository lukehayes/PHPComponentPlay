<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\View;

$request = Request::createFromGlobals();
$server  = $request->server;
$path    = $request->getPathInfo();

// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {

    // Check for get or post.
    if( $request->getMethod() == "GET")
    {
        $response = View::render('form');
    }else
    {
        $response = new Symfony\Component\HttpFoundation\RedirectResponse("/");
    }

} else {
    $response = View::render('error');
}

$url = "/";

//$resonse->setStatus(300);
// Output page to browser.
$response->send();



