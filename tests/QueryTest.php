<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PDO;
use App\DB\Query;
use App\DB\Database;
use App\DB\SQLiteDatabase;

final class QueryTest extends TestCase
{
    public $db    = NULL;
    public $query = NULL;

    public function setup() : void
    {
        $this->db = new SQLiteDatabase("phpunitdb");
        $this->query = new Query($this->db);
    }

    public function testSelectAll()
    {
        $selectAllQuery = $this->query->selectAll("data");
        $this->assertIsArray($selectAllQuery);
        dump($selectAllQuery);
        $this->assertArrayHasKey('id', $selectAllQuery);
    }
}
