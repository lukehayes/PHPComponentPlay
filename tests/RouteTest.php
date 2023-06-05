<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Routing\Route;

final class RouteTest  extends TestCase
{
    public $route = NULL;

    public function setup() : void
    {
        $this->route = new Route('home','/', 'TestController', 'TestAction');
    }

    public function testRouteGetters(): void
    {
        $this->assertEquals($this->route->getName(), 'home');
        $this->assertEquals($this->route->getPath(), '/');
        $this->assertEquals($this->route->getController(), 'TestController');
        $this->assertEquals($this->route->getAction(), 'TestAction');
    }
}
