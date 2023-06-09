<?php
namespace App\Auth;

/**
 * Static helpers for help with filtering input data.
 */
class Guard
{
    /**
     * Remove slashes from an input string.
     *
     * @param string $input.
     *
     * @return string.
     */
    public static function slashes(string $input)
    {
        $sanitizedData = htmlspecialchars($input);
        $sanitizedData = filter_var(
            $sanitizedData,
            FILTER_SANITIZE_ADD_SLASHES
        );

        return $sanitizedData;
    }

    /**
     * Sanitize an email address.
     *
     * @param string $input.
     *
     * @return string.
     */
    public static function email(string $input) : string
    {
        return filter_var(
            $input,
            FILTER_SANITIZE_EMAIL
        );
    }
}
