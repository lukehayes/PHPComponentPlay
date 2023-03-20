<?php
namespace App\Service;

use App\Service\Service;
use App\Router;

class RouterService extends Service
{
    /**
     * @var $service */
    public ?Router $service = NULL;

    public function __construct()
    {
        $this->service = new Router();
        return $this->service;
    }

    /**
     * Get the underlying service.
     *
     * @return Object
     */
    public function get() : Object
    {
        return $this->service;
    }
}

