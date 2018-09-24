<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Sanitizer;

/**
 * TaxIdNumber
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class TaxIdNumber extends AbstractAttribute
{

    /**
     * Internalize
     *
     * @param mixed $value
     */
    protected function internalize($value): string
    {
        if (! is_string($value)) {
            throw new ValidationException('must be a string');
        }

        $taxIdNumber = Sanitizer::stripWhitespaceAndDashes($value);

        $match = preg_match('~^[0-9]{9}$~', $taxIdNumber);
        if ($match) {
            return $taxIdNumber;
        }

        throw new ValidationException("Tax id number. '$taxIdNumber', is invalid");
    }
}
