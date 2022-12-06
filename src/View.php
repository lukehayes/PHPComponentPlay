<?php
namespace App;

use Symfony\Component\HttpFoundation\Response;

/**
 * Helper class for managing templates.
 */
class View
{
    /**
     * Read and return the contents of a template inside an
     * HttpFoundation\Response object.
     *
     * @param string $file    The name of the file to load.
     *
     * @return Response;
     */
    static public function render(string $file) : Response
    {
        return new Response(file_get_contents("../templates/$file.php"));
    }
}
