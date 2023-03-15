<?php
namespace App\Controllers;

use App\Request;

class BaseController
{
    public $request = NULL;

    public function __construct()
    {
        $this->request = new Request();
    }
}
