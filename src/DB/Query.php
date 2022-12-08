<?php

namespace App\DB;

use App\DB\Database;

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
     * Runs select * on a given table.
     *
     * @param string $table
     *
     * @return PDO
     */
    public function selectAll(string $table): array
    {
        $query = "select * from {$table}";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }
}
