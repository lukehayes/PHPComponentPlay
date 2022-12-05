<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$server = $request->server;
$path = $request->getPathInfo();

// First iteration of a router/front-controller.

if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {
    $response = new Response('Contact Page');
} else {
    $response = new Response('404. Something has gone wrong');
}

// Output page to browser.
$response->send();
