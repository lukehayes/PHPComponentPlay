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
            'Twig',
            $this->container->services(),
            "Instance of " . \App\Service\TwigService::class . " not found"
        );

        $this->assertArrayHasKey(
            'DB',
            $this->container->services(),
            "Instance of " . \App\Service\DatabaseService::class . " not found"
        );

        $this->assertArrayHasKey(
            'Router',
            $this->container->services(),
            "Instance of " . \App\Service\RouterService::class . " not found"
        );

        $this->assertArrayHasKey(
            'Doctrine',
            $this->container->services(),
            "Instance of " . \App\Service\Doctrine::class . " not found"
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
