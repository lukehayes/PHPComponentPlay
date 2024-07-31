<?php
namespace App\Service;

use App\App;

class AppService extends Service
{
    private $service = NULL;

    public function __construct()
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
