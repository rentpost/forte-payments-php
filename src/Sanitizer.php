<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi;

class Sanitizer
{
    static public function stripWhitespace($value): string
    {
        return preg_replace('~\s+~', '', (string)$value);
    }

    static public function stripWhitespaceAndDashes($value): string
    {
        return preg_replace('~[\s-]+~', '', (string)$value);
    }

    static public function stripNonNumeric($value): string
    {
        return preg_replace('~[^0-9]~', '', (string)$value);
    }


}
