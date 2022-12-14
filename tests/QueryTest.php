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
        $query = $this->query->selectAll('users');

        $this->assertIsArray($query);

        $this->assertNotEmpty($query);

        $this->assertArrayHasKey('0', $query);

    }

    public function testSelectFrom()
    {
        $query = $this->query->selectFrom('users', 'id', 'username');

        $this->assertIsArray($query);

        $this->assertNotEmpty($query);

        $this->assertArrayHasKey('0', $query);

        $this->assertObjectHasAttribute('username', $query[0]);
    }

    public function testGetUser()
    {
        $user = $this->query->getUser('admin');

        $this->assertNotEmpty($user);

        $this->assertObjectHasAttribute('username', $user);
   }
}
