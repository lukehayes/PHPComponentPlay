<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controllers\BaseController;
use App\View;

class TestController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // TODO Implement a cleaner way to return view templates.
        $twig = \App\App::get(\App\Service\TwigService::class);
        $twig->display('home.php');
    }

    public function login(Request $request) : Response
    {
        if($request->getMethod() == 'GET')
        {
            return View::load("form");
        }else
        {
            dd($request->request->all());
        }
    }
}
