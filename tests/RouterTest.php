<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Routing\Router;
use App\Routing\Route;

final class RouterTest  extends TestCase
{
    public $router = NULL;

    public $testRoute = NULL;


    public function setup() : void
    {
        $this->router = new Router();
        $this->testRoute = new Route('home', '/', 'TestController', 'TestAction');

        $this->router->get($this->testRoute);
        dump($this->router);
    }

    public function testCanAddGetRoute()
    {
        $newRoute = new Route('other', '/other', 'OtherController', 'OtherAction');

        // Route already added, so this should fail.
        $this->assertFalse($this->router->get($this->testRoute));

        // Route NOT already added, so this should pass.
        $this->assertTrue($this->router->get($newRoute));

        $this->assertArrayHasKey($newRoute->getPath(), $this->router->getRoutes()['GET']);

        $this->assertArrayHasKey($newRoute->getPath(), $this->router->getRoutes()['GET']);
    }

    public function testCanFindRoute()
    {
        $this->assertTrue($this->router->findRoute());
    }

    public function testNoDuplicateGetRoute()
    {
        $this->assertFalse($this->router->get($this->testRoute));

        $this->assertArrayHasKey($this->testRoute->getPath(), $this->router->getRoutes()['GET']);
    }
}
