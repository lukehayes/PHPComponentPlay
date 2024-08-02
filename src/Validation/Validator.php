<?php

namespace App\Validation;

class Validator
{
    /*
     * Run validations on a string.
     *
     * @param string $str    The string to validate.
     *
     * @return string    The validated string.
     */
    public static function validate(string $str) : string
    {
        return self::sanitize($str);
    }

    /*
     * Sanitize a string using filter_var and htmlspecialchars.
     *
     * @param string $str    The string to sanitize.
     *
     * @return string    The sanitized string.
     */
    private static function sanitize(string $str) : string
    {
        $str = filter_var($str,
                          FILTER_SANITIZE_URL |
                          FILTER_DEFAULT);

        $str = htmlspecialchars($str);

        return $str;
    }

    /*
     * Check if a string is empty.
     *
     * @param string $str    The string to sanitize.
     *
     * @return string    The sanitized string.
     */
    private static function isEmpty(string $str) : bool
    {
        return empty($str) && !isset($str);
    }
}
