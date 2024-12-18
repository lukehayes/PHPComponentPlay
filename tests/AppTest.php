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
        $this->assertInstanceOf(
            \App\Service\RouterService::class,
            App::getServiceInstance('Router')
        );

        $this->assertInstanceOf(
            \App\Service\DatabaseService::class,
            App::getServiceInstance('Database')
        );

        $this->assertInstanceOf(
            \App\Service\TwigService::class,
            App::getServiceInstance('Twig')
        );

        $this->assertInstanceOf(
            \App\Service\DoctrineService::class,
            App::getServiceInstance('Doctrine')
        );
    }
    
    public function testHasServiceContainer()
    {
        $this->assertInstanceOf(\App\Container::class, app::container());
    }
}
