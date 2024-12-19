<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Service\RouterService;
use App\Routing\Router;

final class RouterServiceTest extends TestCase
{
    public $routerSerivce = NULL;

    public function setup() : void
    {
        // TODO Implement Router Service Tests.
        $this->markTestIncomplete();
        $this->routerSerivce = new RouterService();
        $this->routerSerivce->boot();
    }


    public function testServiceHasInitialized(): void
    {
        $this->assertTrue($this->routerSerivce->hasInitialized());
    }

    public function testCanGetService(): void
    {
        $this->assertNotNull($this->routerSerivce);

        $this->assertInstanceOf(RouterService::class, $this->routerSerivce);

        $this->assertInstanceOf(Router::class, $this->routerSerivce->get());
    }
}
