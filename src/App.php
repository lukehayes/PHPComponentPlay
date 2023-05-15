<?php 
namespace App;

use App\Container;
use App\Service\TwigService;
use App\Service\DatabaseService;

class App
{

    private static $container = NULL;

    /**
    * Set the apps service container explicitly.
    *
    * @param Container $container.
    *
    * @return void.
    */
    public static function setContainer(Container $container)
    {
        static::$container = $container;

        // TODO Refactor this logic out into another function/
        // object when it gets a little larger.
        // 
        // Add default services here.
        static::$container->addService(TwigService::class);
        static::$container->addService(DatabaseService::class);
    }


    /**
    * Get an instance of the service container.
    *
    * @return App\Container;
    */
    public static function container() : Container
    {
        return static::$container;
    }

    /**
    * Get a service from the container.
    *
    * @param string $service
    *
    * @return App\Container;
    */
    public static function get(string $service)
    {
        return static::container()->get($service);
    }
}

