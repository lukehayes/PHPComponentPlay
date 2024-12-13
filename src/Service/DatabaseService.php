<?php
namespace App\Service;

use App\Service\Service;
use App\DB\SQLiteDatabase;
use App\DB\Database;

class DatabaseService extends Service
{
    /**
     * The instance of a service.
     *
     * @var App\DB\Database | null
     * */
    private $service = NULL;

    public function __construct() {}

    /**
     * Initialize the underlying service.
     */
    public function boot()
    {
		$this->service = new SQLiteDatabase("sqlite.db");
    }

    /**
     * Get the underlying service.
     *
     * @return mixed
     */
    public function get() : ?Database
    {
        return $this->service;
    }
}

