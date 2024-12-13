<?php
namespace App\Service;

use App\App;

class AppService extends Service
{
    /**
     * The instance of a service.
     *
     * @var App\App | null
     * */
    private $service = null;

    public function __construct() {}

    /**
     * Initialize the underlying service.
     */
    public function boot()
    {
	    $this->service = new App;
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
