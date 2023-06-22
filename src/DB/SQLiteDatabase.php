<?php

namespace App\DB;

use App\DB\Database;
use PDO;

class SQLiteDatabase extends Database
{
    /** @var string db */
    private ?string $db = null;

    /** @var string dsn */
    private ?string $dsn = null;

    /**
     * Constructor
     *
     * @param string $databaseName    The name of the database. Defaults to "test".
     */
    public function __construct(string $databaseName = "test")
    {
        $this->db = $databaseName;
        $this->dsn = "sqlite:" . $this->db;

        $this->connection = new PDO($this->dsn);

        $this->connection->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_OBJ
        );
    }

    /**
     * Get the name of the database.
     *
     * @return PDO
     */
    public function getDBName() : string
    {
        return $this->db;
    }

    /**
     * Get the name of the database.
     *
     * @return PDO
     */
    public function getDsn() : string
    {
        return $this->dsn;
    }

    /**
     * Connection getter.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
