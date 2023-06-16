<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\App;

final class AppTest extends TestCase
{
    public $app;

    public function setup() : void
    {
        $this->app = new App();
        $this->app::setContainer(new (\App\Container::class));
    }

    public function testAppCanGetService()
    {
        $this->assertIsString(
            $this->app->get(\App\Service\RouterService::class)
        );

        $this->assertInstanceOf(
            \App\Service\RouterService::class,
            $this->app->getInstance(\App\Service\RouterService::class)
        );
    }
    
    public function testHasServiceContainer()
    {
        $this->assertInstanceOf(\App\Container::class, app::container());
    }
}
