<?php 
namespace App\Routing;

use App\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{
    /** @var $routes */
    private array|null $routes = null;

    /** @var $request */
    private Request $request;

    public function __construct()
    {
        $this->routes['GET'] = [];
        $this->routes['POST'] = [];

        $this->request = Request::createFromGlobals();
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
    public function routeAvailable() : bool
    {
        $uri    = $this->request->server->get('REQUEST_URI');
        $method = $this->request->server->get('REQUEST_METHOD');
        $routes = $this->routes[$method];

        return array_key_exists($uri, $routes) ? true : false;
    }

    /**
     * Check if a route is available to the application and then load it.
     *
     * @return void.
     */
    public function resolveRoute()
    {
        $uri    = $this->request->server->get('REQUEST_URI');
        $method = $this->request->server->get('REQUEST_METHOD');
        $routes = $this->routes[$method];

        if($this->routeAvailable())
        {
            $routeObject = $this->routes[$method][$uri];
            $controller = new ($routeObject->getController());
            $action = $routeObject->getAction();
            $controller->$action(
                $this->request
            );

        }else
        {
            $response = new Response('No Route Found', Response::HTTP_NOT_FOUND);
            $response->send();
        }
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
        $method = 'GET';

        if(array_key_exists($route->getPath(), $this->routes[$method]))
            return false;

        $this->routes[$method][$route->getPath()] = $route;
            return true;
    }

    /**
     * Add a POST route to the router. If the key already
     * exists, then false is returned.
     *
     * @param Route $route.
     *
     * @return bool.
     */
    public function post(Route $route) : bool
    {
        $method = 'POST';
        if(array_key_exists($route->getPath(), $this->routes[$method]))
            return false;

        $this->routes[$method][$route->getPath()] = $route;
            return true;
    }
}
