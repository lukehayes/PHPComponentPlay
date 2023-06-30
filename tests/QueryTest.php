<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\App;
use App\Container;
use App\DB\Query;

/**
 * Tests for \App\DB\Query class, not the class that will use
 * the Doctrine DBAL library.
 */
final class QueryTest extends TestCase
{
    public $app;
    public $container;
    public $query;
    public $db;

    public function setup() : void
    {
        $this->app = new App();
        $this->container = new Container();
        $this->app::setContainer($this->container);

        $this->db = $this->container->getInstance('DB');
        $this->query = new Query($this->db->get());
    }

    public function testCanSelectAll()
    {
        $rows = $this->query->selectAll('users');

        $this->assertIsArray($rows);
    }

    public function testSelectAllNotEmpty()
    {
        $rows = $this->query->selectAll('users');
        $this->assertGreaterThan(0, count($rows));
    }
}
