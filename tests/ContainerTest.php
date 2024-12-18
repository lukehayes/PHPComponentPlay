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

    public function testContainerHasBooted(): void
    {
        $this->assertTrue($this->container->hasBooted());
    }

    public function testCanGetServiceCount(): void
    {
        $this->assertIsInt($this->container->getServiceCount());

        $this->assertEquals(
            $this->container->getServiceCount(),
            5
        );
    }

    public function testHasDefaultServices(): void
    {
        $this->assertArrayHasKey(
            'Twig',
            $this->container->getServices(),
            "Instance of " . \App\Service\TwigService::class . " not found"
        );

        $this->assertArrayHasKey(
            'Database',
            $this->container->getServices(),
            "Instance of " . \App\Service\DatabaseService::class . " not found"
        );

        $this->assertArrayHasKey(
            'Router',
            $this->container->getServices(),
            "Instance of " . \App\Service\RouterService::class . " not found"
        );

        $this->assertArrayHasKey(
            'Doctrine',
            $this->container->getServices(),
            "Instance of " . \App\Service\DoctrineService::class . " not found"
        );
    }

    public function testCanGetService()
    {
        $this->assertTrue(
            $this->container->has('Twig'),
            "Instance of " . 'Twig'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\TwigService::class,
            $this->container->getInstance('Twig'),
            "Instance of " . 'Twig'. " not found"
        );
    }
}
