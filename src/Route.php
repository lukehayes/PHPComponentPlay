<?php
namespace App;

class Route 
{
  private $path = NULL;

  private $action = NULL;

  private $controller = NULL;
  
  public function __construct($path, $controller, $action)
  {
    $this->path = $path;
    $this->action = $action;
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
}
