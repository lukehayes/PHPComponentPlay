<?php
namespace App\Service;

use App\Service\Service;
use App\DB\Database;
use App\DB\PDOConnection;

class DatabaseService extends Service
{
    private $service = NULL;

    public function __construct()
    {
		$this->service = new Database(new PDOConnection());
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
