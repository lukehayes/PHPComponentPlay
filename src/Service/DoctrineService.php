<?php
namespace App\Service;

use Doctrine\DBAL\DriverManager;


class DoctrineService extends Service
{
    /**
     * The instance of a service.
     *
     * @var Doctrine\DBAL\DriverManager | null
     */
    private $service = NULL;

    public function __construct() {}

    /**
     * Initialize the underlying service.
     */
    public function boot()
    {
        $connectionParams = [
            'driver' => 'sqlite3',
            'path' => 'db.db'
        ];

        $this->service = DriverManager::getConnection($connectionParams);

        $this->initialized = true;
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

