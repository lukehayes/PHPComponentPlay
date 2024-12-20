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

    public function testCanGetAppService()
    {
        $this->assertTrue(
            $this->container->has('App'),
            "Instance of " . 'App'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\AppService::class,
            $this->container->getInstance('App'),
            "Instance of " . 'App'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\AppService::class,
            $this->container->get('App'),
            "Instance of " . 'App'. " not found"
        );
    }

    public function testCanGetTwigService()
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

        $this->assertInstanceOf(
            \App\Service\TwigService::class,
            $this->container->get('Twig'),
            "Instance of " . 'Twig'. " not found"
        );
    }

    public function testCanGetRouterService()
    {
        $this->assertTrue(
            $this->container->has('Router'),
            "Instance of " . 'Router'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\RouterService::class,
            $this->container->getInstance('Router'),
            "Instance of " . 'Router'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\RouterService::class,
            $this->container->get('Router'),
            "Instance of " . 'Router'. " not found"
        );
    }

    public function testCanGetDatabaseService()
    {
        $this->assertTrue(
            $this->container->has('Database'),
            "Instance of " . 'Database'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\DatabaseService::class,
            $this->container->getInstance('Database'),
            "Instance of " . 'Database'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\DatabaseService::class,
            $this->container->get('Database'),
            "Instance of " . 'Database'. " not found"
        );
    }

    public function testCanGetDoctrineService()
    {
        $this->assertTrue(
            $this->container->has('Doctrine'),
            "Instance of " . 'Doctrine'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\DoctrineService::class,
            $this->container->getInstance('Doctrine'),
            "Instance of " . 'Doctrine'. " not found"
        );

        $this->assertInstanceOf(
            \App\Service\DoctrineService::class,
            $this->container->get('Doctrine'),
            "Instance of " . 'Doctrine'. " not found"
        );
    }
}
