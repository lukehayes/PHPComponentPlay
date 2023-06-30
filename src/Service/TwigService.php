<?php
namespace App\Service;

use App\Service\Service;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigService extends Service
{
    private $service = NULL;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $this->service = new Environment($loader, ['debug' => 'true']);
        $this->service->addExtension(new \Twig\Extension\DebugExtension);
    }

    /**
     * Get the underlying service.
     *
     * @return Object
     */
    public function get() : Object
    {
        return $this->service;
    }
}

