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

  public function index() : Response
  {
    return View::load("home");
  }

  public function other() : Response
  {
    return View::load("form");
  }
}
