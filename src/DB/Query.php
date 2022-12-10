<?php

namespace App\DB;

use App\DB\Database;
use App\DB\Model\User;

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
        return ($this->conn->query($query))->fetchAll();
    }

    /**
     * Select specific fields from the database.
     *
     * @param string $table      The name of the table.
     *
     * @param string $columns    All of the columns to retrive from the table.
     *
     * @return PDO
     */
    public function selectFrom(string $table, ...$columns): array
    {
        $query = "select ";

        foreach($columns as $column)
        {
            $query .= $column . " ";
        }

        $query .= "from $table";

        return ($this->conn->query($query))->fetchAll();
    }

    /**
     * Get a specific user from the database.
     *
     * @param string $user       The username to search for.
     *
     * @param string $table      The name of the table.
     *
     * @return Object
     */
    public function getUser(string $user, string $table = 'users') : object
    {
        $query = "select * from $table where username=?";
        $pdo_statement  = $this->conn->prepare($query);
        $pdo_statement->execute([$user]);
        return $pdo_statement->fetchObject(User::class);
    }
}
