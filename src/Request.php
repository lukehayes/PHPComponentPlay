<?php
namespace App;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

/**
 * Request class exists to add helper methods for common
 * tasks when working with a Request.
 */
class Request extends SymfonyRequest
{
    public $current = NULL;

    public function __construct()
    {
        $this->current = SymfonyRequest::createFromGlobals();
    }

    /**
    * Get a specific request parameter.
    *
    * @return mixed.
    */
    public function getParam(string $param) : mixed
    {
        return $this->current->request->get($param);
    }

    /**
    * Get all of the parameters that where explictly set from the current request.
    *
    * @return array.
    */
    public function getSetParams() : array
    {
        return array_filter(
            $this->current->request->all(),
            fn($param) => isset($param) && !empty($param)
        );
    }

    /**
     * Get all of the parameters from the current request regardless
     * if they have been set or not.
    *
    * @return array.
    */
    public function getParams() : array
    {
        return $this->current->request->all();
    }
}

