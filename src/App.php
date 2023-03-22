<?php 
namespace App;

use App\Container;
use App\Service\TwigService;

class App
{
    /**
    * Get an instance of the service container.
    *
    * @return App\Container;
    */
    public static function container() : Container
    {
        $container = new Container();

        // Add default services here.
        $container->addService(TwigService::class, new TwigService());

        return $container;
    }

    /**
    * Get an get a service from the container.
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

