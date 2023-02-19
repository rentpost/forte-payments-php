<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\UriBuilder;

use Rentpost\ForteApi\Exception\LibraryGenericException;

/**
 * Wrapper for `vsprintf()` which confirms the count of
 * the substitution args.
 *
 * https://stackoverflow.com/a/38728135/1241791
 */
class Formatter
{

    /**
     * @param string $format `printf` compatible string
     * @param array $args
     *
     * @throws LibraryGenericException
     */
    public static function format(string $format, array $args): string
    {
        $pattern = "~%(?:(\d+)[$])?[-+]?(?:[ 0]|['].)?(?:[-]?\d+)?(?:[.]\d+)?[%bcdeEufFgGosxX]~";

        $countArgs = count($args);
        preg_match_all($pattern, $format, $expected);
        $countVariables = isset($expected[0]) ? count($expected[0]) : 0;

        if ($countArgs !== $countVariables) {
            throw new LibraryGenericException(
                'The number of arguments in the string does not match the number of arguments in the format string.',
            );
        }

        return vsprintf($format, $args);
    }
}
