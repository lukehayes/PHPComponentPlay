<?php
namespace App;

use Symfony\Component\HttpFoundation\Response;

/**
 * Helper class for managing templates.
 */
class View
{
    static public function render(string $file) : Response
    {
        return new Response(file_get_contents("../templates/$file.php"));
    }
}
