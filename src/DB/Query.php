<?php

namespace App\DB;

use App\DB\Database;
use App\DB\SQLiteDatabase;

class Query
{
    private $conn = NULL;

    /**
     * Constructor.
     *
     * @param Database $db.
     */
    public function __construct(Database $db)
    {
        $this->conn = $db->getConnection();
    }

    /**
     * Select all
     *
     * @return PDO
     */
    public function selectAll(string $table) : array
    {
        dump($this->conn);
        $query = "select * from {$table}";
        $stmt = $this->conn->exec($query);
        dump($stmt);
        //dump($stmt->fetchAll());
        return $stmt->fetchAll();
    }
}

