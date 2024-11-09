<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Sanitizer;

/**
 * Routing number for a bank account
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class BankRoutingNumber extends AbstractAttribute
{

    /**
     * {@inheritdoc}
     */
    protected function internalize($value): string
    {
        if (!$value) {
            throw new ValidationException('A valid bank routing number must be provided');
        }

        $usRoutingNumber = $this->tryUsRoutingNumber($value);
        if ($usRoutingNumber) {
            return $usRoutingNumber;
        }

        $caRoutingNumber = $this->tryCaRoutingNumber($value);
        if ($caRoutingNumber) {
            return $caRoutingNumber;
        }

        throw new ValidationException('Not a valid US or CA routing number. raw value = `' . $value . '`');
    }


    /**
     * Tries to match for a US routing number
     *
     * @param [type] $value
     *
     * @return string|null
     */
    protected function tryUsRoutingNumber($value): ?string
    {
        $number = Sanitizer::stripWhitespaceAndDashes($value);

        if (!is_numeric($number) || strlen($number) !== 9) {
            return null;
        }

        // Perform a checksum on the number
        $one = $number[0] * 3; // First digit X 3
        $two = $number[1] * 7; // Second digit X 7
        $three = $number[2] * 1; // Third digit X 1
        $four = $number[3] * 3; // Fourth digit X 3
        $five = $number[4] * 7; // Fifth digit X 7
        $six = $number[5] * 1; // Sixth digit X 1
        $seven = $number[6] * 3; // Seventh digit X 3
        $eight = $number[7] * 7; // Eighth digit X 7
        $nine = $number[8] * 1; // Last digit X 1

        // Sum of all the above should be equal to a multiple of 10
        // Ex. 150,160,170 etc.
        $sum = $one + $two + $three + $four + $five + $six + $seven + $eight + $nine;

        // Check if its a multiple of 10
        if ($sum % 10 === 0) {
            return $number;
        }

        return null;
    }


    /**
     * Tries to match for a Canadian routing number
     *
     * @param string $value
     *
     * @return string|null
     */
    protected function tryCaRoutingNumber(string $value): ?string
    {
        $number = Sanitizer::stripWhitespaceAndDashes($value);

        $match = preg_match('~^0?[0-9]{8}$~', $number); // 9 digits with leading 0, or 8 digits
        if ($match) {
            return $number;
        }

        return null;
    }
}
