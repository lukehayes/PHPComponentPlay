<?php 
namespace App\Routing;

use App\Routing\Route;


class Router
{
    /**
     * A multi dimensional array for all of the routes
     * available to the application.
     */
    private array|null $routes = null;

    public function __construct()
    {
        $this->routes['GET'] = [];
        $this->routes['POST'] = [];
    }

    /**
     * Routes getter function.
     *
     * @return array
     */
    public function getRoutes() : array
    {
        return $this->routes;
    }

    /**
     * Add a GET route to the router. If the key already
     * exists, then false is returned.
     *
     * @param Route $route.
     *
     * @return bool.
     */
    public function get(Route $route) : bool
    {
        if(array_key_exists($route->getName(), $this->routes['GET']))
            return false;

        $this->routes['GET'][$route->getName()] = $route;
        return true;
    }

}
