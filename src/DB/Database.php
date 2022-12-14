<?php

namespace App\DB;

abstract class Database
{
    protected ?\PDO $connection = NULL;

    /**
     * Connection getter.
     *
     * @return PDO
     */
    abstract public function getConnection(): \PDO;
}
