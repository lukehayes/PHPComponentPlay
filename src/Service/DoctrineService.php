<?php
namespace App\Service;

use Doctrine\DBAL\DriverManager;


class DoctrineService extends Service
{
    private $service = NULL;

    public function __construct()
    {
        $connectionParams = [
            'driver' => 'sqlite3',
            'path' => 'db.db'
        ];

        $this->service = DriverManager::getConnection($connectionParams);
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

