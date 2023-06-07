<?php
namespace App;

use Symfony\Component\HttpFoundation\Response;

/**
 * Helper class for managing templates.
 */
class View
{
    /**
     * Path to templates directory. **/
    const TEMPLATE_PATH = "../templates/";

    /**
     * Path to partials directory. **/
    const PARTIALS_PATH = self::TEMPLATE_PATH . "/partials/";

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

    /**
     * Load a template file with header and footer patials.
     *
     * @param string $file    The name of the file to load.
     *
     * @return Response
     */
    public static function load(string $file) : Response
    {
        $template  = file_get_contents("../templates/partials/header.php");
        $template .= file_get_contents("../templates/$file.php");
        $template .= file_get_contents("../templates/partials/footer.php");

        return (new Response($template))->send();
    }
}
