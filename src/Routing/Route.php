<?php
namespace App\Routing;

class Route 
{
    /**
     * @var $path    The path of the route. */
    private $path       = NULL;
    /**
     * @var $action    The action of the route. */
    private $action     = NULL;
    /**
     * @var $controller    The controller of the route. */
    private $controller = NULL;
    /**
     * @var $name    The name assoicated with the route. */
    private $name       = NULL;

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
