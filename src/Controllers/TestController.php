<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
  public function index(Request $request) : Response
  {
    // dump($request);
    return new Response("Endpoint");
  }

  public function other(Request $request) : Response
  {
    // dump($request);
    return new Response("Other Endpoint");
  }
}
