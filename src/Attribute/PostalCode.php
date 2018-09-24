<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Exception\LibraryFaultException;
use Rentpost\ForteApi\Sanitizer;

class PostalCode extends AbstractAttribute
{
    /**
     * Accepts either US or Canadian PostalCode
     *
     * US Formats:
     * `11111`
     * `11111 1111`
     * `11111-1111`
     *
     * CA Format:
     * `A1A1A1`
     * `A1A 1A1`
     * `A1A-1A1`
     *
     * @param $value
     *
     * @return string
     * @throws ValidationException
     * @internal param $value
     */
    protected function internalize($value): string
    {
        return $value; // FIXME for the moment skipping all this validation. There might be some endpoinds which are more strict and require a well formed US/CA postcode, in which case we can re-think this.


        if (!is_string($value)) {
            throw new ValidationException('Postcode must be passed as a string');
        }

        $usPostalCode = $this->tryUsPostalCode($value);

        if ($usPostalCode) {
            return $usPostalCode;
        }

        $caPostalCode = $this->tryCaPostalCode($value);

        if ($caPostalCode) {
            return $caPostalCode;
        }

        throw new ValidationException('Does not appear to be a valid US or CA postcode. raw input = `' . $value . '`');
    }


    protected function tryUsPostalCode(string $value): ?string
    {
        $usPostalCode = trim($value);

        $match = preg_match('~^[0-9]{5}([ -]?[0-9]{4})?$~', $usPostalCode);

        if ($match) {
            $usPostalCode = Sanitizer::stripNonNumeric($usPostalCode);
            if (strlen($usPostalCode) === 5) {
                return $usPostalCode;
            } elseif (strlen($usPostalCode) === 9) {
                return substr_replace($usPostalCode, '-', 5, 0); // Puts in format 11111-1111
            } else {
                throw new LibraryFaultException();
            }
        } else {
            return null;
        }
    }


    protected function tryCaPostalCode(string $value): ?string
    {
        $caPostalCode = trim($value);
        $caPostalCode = strtoupper($caPostalCode);

        $caPostalCode = Sanitizer::stripWhitespace($caPostalCode);

        $match = preg_match('~^[ABCEGHJKLMNPRSTVXY]\\d[ABCEGHJKLMNPRSTVWXYZ][ -]?\\d[ABCEGHJKLMNPRSTVWXYZ]\\d$~', $caPostalCode);

        if ($match) {
            $caPostalCode = Sanitizer::stripWhitespaceAndDashes($caPostalCode);

            return substr_replace($caPostalCode, ' ', 3, 0); // Puts in format A1A 1A1
        } else {
            return null;
        }
    }


}
