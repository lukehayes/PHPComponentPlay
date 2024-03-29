<?php
namespace App;

use App\Service\Service;
use App\Service\ServiceNotFoundException;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * A very simple/basic service container.
 */
class Container implements ContainerInterface
{
    /**
     * @var array $sevices
     */
    private $services = [];

    public function __construct()
    {
        $this->setDefaultServices();
    }

    private function setDefaultServices()
    {
        $this->addService('Twig',     \App\Service\TwigService::class);
        $this->addService('DB',       \App\Service\DatabaseService::class);
        $this->addService('Router',   \App\Service\RouterService::class);
        $this->addService('Doctrine', \App\Service\DoctrineService::class);
    }

    /**
     * Add a service to the container. If the service already exists,
     * then it will be overwritten.
     *
     * @param string $name        The name to give to the service for reference.
     *
     * @param string $service:    The complete service namespace.
     *
     * @return void.
     */
    public function addService(string $name, string $service) : void 
    {

        $this->services[ucfirst($name)] = $service;
    }

    /**
     * Get a new instance of a service from the container.
     *
     * @param string $name The name of the service to retrieve from the container.
     *
     * @throws ServiceNotFoundException.
     *
     * @return Service.
     */
    public function getInstance(string $name) : Service
    {
        $name = ucfirst($name);

        if(!$this->has($name))
            throw new ServiceNotFoundException("$name service could not be found.");

        return new ($this->get($name));
    }


    /**
     * Get a list of all the available services.
     *
     * @return array.
     */
    public function services() : array
    {
        return $this->services;
    }


    /**
     * Wrapper for Contianer::has() method.
     *
     * @throws ServiceNotFoundException.
     *
     * @return bool.
     */
    public function hasService(string $id) : bool
    {
        return $this->has($id);
    }


    /**
     * ---------------------------------------------------------------------
     * PSR CONTAINER
     * ---------------------------------------------------------------------
     *
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get(string $id) : mixed
    {
        if(array_key_exists($id, $this->services))
        {
            if(isset($this->services[$id]))
            {
                return $this->services[$id];
            }
        }else
        {
            throw new ServiceNotFoundException("Service: [$id] could not be found.");
        }
    }


    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services) ? true : false;
    }
}
