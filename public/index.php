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
function view(string $file): string
{
    return file_get_contents("../templates/$file.php");
}

// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = new Response('Homepage.');
} else if (in_array($path, ['/contact'])) {
    $response = new Response(view('form'));
} else {
    $response = new Response(view('error'));
}

// Output page to browser.
$response->send();
