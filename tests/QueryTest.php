<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use App\DB\Query;
use App\DB\SQLiteDatabase;

final class QueryTest extends TestCase
{
    public $db    = NULL;
    public $query = NULL;

    public function setup(): void
    {
        $this->db = new SQLiteDatabase('phpunitdb');
        $this->query = new Query($this->db);
    }

    public function testSelectAll()
    {
        $selectAllQuery = $this->query->selectAll('users');

        $this->assertIsArray($selectAllQuery);

        $this->assertNotEmpty($selectAllQuery);

        $this->assertArrayHasKey('0', $selectAllQuery);

    }

    public function testSelectFrom()
    {
        $selectAllQuery = $this->query->selectFrom('users', 'id', 'username');

        $this->assertIsArray($selectAllQuery);

        $this->assertNotEmpty($selectAllQuery);

        $this->assertArrayHasKey('id', $selectAllQuery[0]);
    }

    public function testGetUser()
    {
        $userRow = $this->query->getUser('developer');

        $this->assertNotEmpty($userRow);

        $this->assertObjectHasAttribute('username', $userRow);
   }
}
