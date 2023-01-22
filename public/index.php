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
$user = NULL;

$session = new Session();
//$session->getFlashBag()->add('notice', 'A quick flash message');
//$session->getFlashBag()->add('login_failed', 'Failed to login.');
//$session->getFlashBag()->add('user_not_found', 'Username could not be found');
//$session->getFlashBag()->add('force_login',    'You must sign in to access that page');

// First iteration of a router/front-controller.
if (in_array($path, ['/'])) {

    $response = View::load('home');

} else if (in_array($path, ['/login'])) {

    if( $request->getMethod() == "GET")
    {
        if( $session->getFlashBag()->has('user_not_found'))
        {
            dump($session->getFlashBag()->all());
        }

        // Load the login form if its a GET request.
        $response = View::load('form');
    }else
    {
        // Get user input from the form.
        // Process the input if POST.
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $user = $query->getUser($username) ?? false;

        // TODO Implement authentication
        //
        // Get user input.
        // Check in database for user.
        // Check password.
        // If any failiure, take back to the login screen with errors.
        // Else - Take user to dashboard, fill session variable with username etc.
    
        $password_fail = false;
        $username_fail = false;

        if(!empty($password) && $user->password === $password)
        {
            //die("Login Success");
            $response = new RedirectResponse('/dashboard');
        }else {
            $session->getFlashBag()->add('user_not_found', 'User could not be found');
            $response = new RedirectResponse('/login');
        }
    }

} else if (in_array($path, ['/dashboard'])) {

    dump($user);
    die();
    
    if(!$user)
    {
        $session->getFlashBag()->add('user_null', 'User is null');
        $response = new RedirectResponse('/login');
    }else
    {
        $response = new Response('Showing Dashboard.');
    }
} else {
    $response = View::load('error');
}

//$resonse->setStatus(300);
// Output page to browser.
$response->send();



