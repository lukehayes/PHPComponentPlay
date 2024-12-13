<?php
namespace App\Service;

use App\Service\Service;
use App\Routing\Router;

class RouterService extends Service
{
    /**
     * The instance of a service.
     *
     * @var Router | null
     * */
    public ?Router $service = NULL;

    public function __construct() {}

    /**
     * Initialize the underlying service.
     */
    public function boot()
    {
        $this->service = new Router();
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

