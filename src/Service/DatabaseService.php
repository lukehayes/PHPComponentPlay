<?php
namespace App\Service;

use App\Service\Service;
use App\DB\SQLiteDatabase;

class DatabaseService extends Service
{
    private $service = NULL;

    public function __construct()
    {
		$this->service = new SQLiteDatabase("sqlite.db");
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

