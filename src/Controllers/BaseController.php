<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class BaseController
{
    public $request = NULL;

    protected $twig = NULL;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->twig = \App\App::get('Twig');

        // TODO Add instance of app class to base controller
        //      or some other way to make the App class available.
    }
}
