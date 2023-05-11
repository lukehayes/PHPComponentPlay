<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class BaseController
{
    public $request = NULL;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
}
