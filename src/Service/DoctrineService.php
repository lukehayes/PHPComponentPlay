<?php
namespace App\Service;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;


class DoctrineService extends Service
{
    private $service = NULL;

    public function __construct()
    {

        $connectionParams = [
            'dbname' => 'db.db',
            'driver' => 'sqlite3',
            'path' => 'public'
        ];

        // $dsnParser = new DsnParser();
        // $connectionParams = $dsnParser
        // ->parse('sqlite3://doctrine.db');

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

