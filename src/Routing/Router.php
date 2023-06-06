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
     * Check to see if there is an available route for the current URI.
     *
     * @return bool
     */
    public function findRoute() : bool
    {
        $uri    = $this->request->server->get('REQUEST_URI');
        $method = $this->request->server->get('REQUEST_METHOD');
        $routes = $this->routes['GET'];

        return array_key_exists($uri, $routes) ? true : false;
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
