<?php

namespace App\DB;

use App\DB\Database;
use App\DB\DatabaseRow;

class Query extends DatabaseRow
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
     * Runs select * on a given table.
     *
     * @param string $table
     *
     * @return PDO
     */
    public function selectAll(string $table): array
    {
        $query = "select * from {$table}";
        $this->container = ($this->conn->query($query))->fetchAll();
        return $this->container;
    }
}
