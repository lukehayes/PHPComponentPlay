<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Routing\Router;
use App\Routing\Route;

final class RouterTest  extends TestCase
{
    public $router = NULL;

    public function setup() : void
    {
        $this->router = new Router();
    }

    public function testCanAddGetRoute()
    {
        $route = new Route('home', '/', 'TestController', 'TestAction');

        $this->assertTrue($this->router->get($route));

        $this->assertArrayHasKey($route->getName(), $this->router->getRoutes()['GET']);
    }

    public function testNoDuplicateGetRoute()
    {
        $route = new Route('home', '/', 'TestController', 'TestAction');

        $this->assertTrue($this->router->get($route));

        $this->assertArrayHasKey($route->getName(), $this->router->getRoutes()['GET']);

        $this->assertFalse($this->router->get($route));
    }
}
