<?php 
namespace App;

use App\Container;


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
    * Return the full namespace of the service ready
    * to be instantiated.
    *
    * @param string $service.
    *
    * @return string;
    */
    public static function get(string $service)
    {
        return static::container()->get($service);
    }

    /**
    * Get an new instance of a service from the container.
    *
    * @param string $service.
    *
    * @return App\Service\Service;
    */
    public static function getInstance(string $service)
    {
        return static::container()->getInstance($service);
    }
}

