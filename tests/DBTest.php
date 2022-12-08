<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\DB\Database;
use App\DB\SQLiteDatabase;
use PDO;

final class DBTest  extends TestCase
{
    public $db = NULL;

    public function setup() : void
    {
        $this->db = new SQLiteDatabase("phpunitdb");
    }

    public function testGetConnection(): void
    {
        $this->assertInstanceOf(Database::class, $this->db);
    }

    public function testGetDatabasePDO(): void
    {
        $this->assertInstanceOf(PDO::class, $this->db->getConnection());
    }
}
