<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\App;
use App\Middleware;

/**
 * Tests for \App\DB\Query class, not the class that will use
 * the Doctrine DBAL library.
 */
final class MiddlewareTest extends TestCase
{
    public $app;

    public function setup() : void
    {
        $this->app = new App();

        // TODO Write unit tests for middleware.
    }
}
