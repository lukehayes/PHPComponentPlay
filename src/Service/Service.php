<?php
namespace App\Service;

/**
 * Base class that all services should inherit.
 */
abstract class Service
{
    /**
     * Initialize the underlying service.
     */
    abstract public function boot();

    /**
     * Get the underlying service.
     *
     * @return mixed.
     */
    abstract public function get() : mixed;
}
