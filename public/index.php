<?php

// Start of project.

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$server  = $request->server;
$path    = $request->getPathInfo();

/**
 * Get the contents of a template
 */
function view(string $file): Response
{
    return new Response(file_get_contents("../templates/$file.php"));
}

// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {
    $response = view('form');
} else {
    $response = view('error');
}

// Output page to browser.
$response->send();
