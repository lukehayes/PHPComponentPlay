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
$sesh->getFlashBag()->add('login_failed', 'Failed to login.');
$sesh->getFlashBag()->add('user_not_found', 'Username could not be found');

// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {
    $response = View::load('home');
} else if (in_array($path, ['/login'])) {

    if( $request->getMethod() == "GET")
    {
        //dump($sesh->getFlashBag()->get('notice'));
        // Load the login form if its a GET request.
        $response = View::load('form');
    }else
    {
        // Process the input if POST.
        $username = $request->request->get('username');
        $user = $query->getUser($username);



        if($user->authenticated)
        {
            echo $sesh->get('login_failed');
            $response = new RedirectResponse('/dashboard');
        }else
        {
            dd($sesh->get('login_failed'));
            $response = new RedirectResponse('/login');
        }

        // If login successful then redirect to the dashboard page.
        $response = new RedirectResponse('/dashboard');
    }

} else if (in_array($path, ['/dashboard'])) {
    $response = new Response('Showing Dashboard.');
} else {
    $response = View::load('error');
}

//$resonse->setStatus(300);
// Output page to browser.
$response->send();



