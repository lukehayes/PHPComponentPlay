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

    /** @var $middleware */
    private $middleware = [];

    public function __construct()
    {
        $this->routes['GET']  = [];
        $this->routes['POST'] = [];
        $this->middleware     = [];

        dd(1);

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
     * If the route is not available then return a 404.
     *
     * @return void.
     */
    public function resolveRoute()
    {
        $uri    = $this->request->server->get('REQUEST_URI');
        $method = $this->request->server->get('REQUEST_METHOD');

        if($this->routeAvailable())
        {
            $routeObject = $this->routes[$method][$uri];
            $controller  = new ($routeObject->getController());
            $action      = $routeObject->getAction();

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
     * Add a new Route object to the application. The default method is 'GET'
     * but 'POST' and be used instead.
     *
     * @param Route $route.
     * @param string $method.
     *
     * @return bool.
     */
    public function addRoute(Route $route, string $method='GET') : bool
    {
        if($method !== 'GET' || !$method !== 'POST')
            return false;

        if(array_key_exists($route->getPath(), $this->routes[$method]))
            return false;

        $this->routes[$method][$route->getPath()] = $route;
            return true;
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
     * Does a route with a specific name exist?
     *
     * @param string $name.
     *
     *@return bool.
     */
    public function hasNamedRoute(string $name) : bool
    {
        // TODO Currently only checks GET routes. Needs to add
        // other methods like POST also.

        return !!$this->getNamedRoute($name);
    }

    /**
     * Does a route with a specific name exist?
     *
     * @param string $name.
     *
     * @return ?Array
     */
    public function getNamedRoute(string $name) : ?Array
    {
        return array_filter($this->routes['GET'], function($route) use($name)
        {
            return $route->getName() == $name;
        });
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

    /**
    * Is the current REQUEST_METHOD equal to GET?
    *
    * @return bool.
    */
    public function isGet() : bool
    {
        return $this->request->server->get('REQUEST_METHOD') === 'GET';
    }

    /**
    * Is the current REQUEST_METHOD equal to POST?
    *
    * @return bool.
    */
    public function isPost() : bool
    {
        return $this->request->server->get('REQUEST_METHOD') === 'POST';
    }
}
