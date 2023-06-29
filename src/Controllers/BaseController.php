<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class BaseController
{
    public $request = NULL;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();

        // TODO Add instance of app class to base controller
        //      or some other way to make the App class available.
    }
}
