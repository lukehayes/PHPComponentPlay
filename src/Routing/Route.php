<?php
namespace App\Routing;

/**
 * App\Routing\Route is a class for representing an endpoint inside the application.
 *
 * @example $route = new Route('home','/', 'HomeController', 'index');
 */
class Route 
{
    /**
     * @var string|null The path of the route. */
    private $path;

    /** @var string|null The action of the route. */
    private $action;

    /** @var string|null The controller of the route. */
    private $controller;

    /** @var string|null The name of the route. */
    private $name;

    /**
     * Constructor.
     *
     * @param string $name          The name associated with the route.
     * @param string $path          The path of the route.
     * @param string $controller    The path of the route.
     * @param string $action        The action of the route.
     */
    public function __construct($name, $path, $controller, $action)
    {
        $this->name       = $name;
        $this->path       = $path;
        $this->action     = $action;
        $this->controller = $controller;
    }

    /**
     * Path getter.
     *
     * @return string
     */
    public function getPath() : ?string
    {
        return $this->path;
    }

    /**
     * Action getter.
     *
     * @return string
     */
    public function getAction() : ?string
    {
        return $this->action;
    }

    /**
     * Controller getter.
     *
     * @return string
     */
    public function getController() : ?string
    {
        return $this->controller;
    }

    /**
     * Route name getter.
     *
     * @return string.
     */
    public function getName() : ?string
    {
        return $this->name;
    }
}
