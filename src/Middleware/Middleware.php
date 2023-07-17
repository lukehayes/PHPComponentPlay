<?php
namespace App\Middleware;

use Symfony\Component\HttpFoundation\Request;

abstract class Middleware
{
  public ?Middleware $next = null;

  abstract public function process(Request $request) : ?Middleware;
}

