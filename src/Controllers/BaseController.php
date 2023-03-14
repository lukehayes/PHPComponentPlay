<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class BaseController
{
  protected $request = NULL;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }
}
