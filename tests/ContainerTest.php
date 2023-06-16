<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Container;

final class ContainerTest extends TestCase
{
    public $container = NULL;

    public function setup() : void
    {
        $this->container = new Container();
    }

    public function testHasDefaultServices(): void
    {
        $this->assertArrayHasKey(
            \App\Service\TwigService::class,
            $this->container->services(),
            "Instance of " . \App\Service\TwigService::class . " not found"
        );

        $this->assertArrayHasKey(
            \App\Service\DatabaseService::class,
            $this->container->services(),
            "Instance of " . \App\Service\DatabaseService::class . " not found"
        );

        $this->assertArrayHasKey(
            \App\Service\RouterService::class,
            $this->container->services(),
            "Instance of " . \App\Service\DatabaseService::class . " not found"
        );
    }

    public function testCanGetService()
    {
        $dbClass = \App\Service\DatabaseService::class;

        $this->assertTrue(
            $this->container->has($dbClass),
            "Instance of " . $dbClass. " not found"
        );

        $this->assertInstanceOf(
            $dbClass,
            $this->container->getInstance($dbClass),
            "Instance of " . $dbClass. " not found"
        );
    }
}
