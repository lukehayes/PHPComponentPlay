<?php
namespace App\Middleware;

use Symfony\Component\HttpFoundation\Request;

class ValidatorMiddleware extends Middleware
{
  public ?Middleware $next = null;

  public function process(Request $request) : ?Middleware
  {
    $request->request->set('username', 'MIDDLEWARE CHANGED');

    return $this->next;
  }
}

