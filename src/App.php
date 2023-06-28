<?php 
namespace App;

use App\Container;
use App\Service\Service;


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
    * Get an new instance of a service from the container.
    *
    * @param string $service.
    *
    * @return App\Service\Service;
    */
    public static function getInstance(string $service) : Service
    {
        return static::container()->getInstance($service);
    }

    /**
    * Return a new instance of the underlying object that the service holds.
    *
    * @param string $service.
    *
    * @return string;
    */
    public static function get(string $service) : Object
    {
        return static::getInstance($service)->get();
    }
}

