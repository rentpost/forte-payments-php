<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Sanitizer;

class BankRoutingNumber extends AbstractAttribute
{
    /**
     * {@inheritdoc}
     */
    protected function internalize($value): string
    {
       $usRoutingNumber =  $this->tryUsRoutingNumber($value);

        if ($usRoutingNumber) {
            return $usRoutingNumber;
        }

       $caRoutingNumber =  $this->tryCaRoutingNumber($value);

        if ($caRoutingNumber) {
            return $caRoutingNumber;
        }

        throw new ValidationException('Not a valid US or CA routing number. raw value = `' . $value . '`');
    }

    protected function tryUsRoutingNumber($value): ?string
    {
        $number = Sanitizer::stripWhitespaceAndDashes($value);

        if(!is_numeric($number) || strlen($number) !== 9) {
            return null;
        }

        //perform a checksum on the number
        $one = $number[0] * 3;//first digit X 3
        $two = $number[1] * 7;//second digit X 7
        $three = $number[2] * 1;//third digit X 1
        $four = $number[3] * 3;//fourth digit X 3
        $five = $number[4] * 7 ;//fifth digit X 7
        $six = $number[5] * 1;//sixth digit X 1
        $seven = $number[6] * 3;//seventh digit X 3
        $eight = $number[7] * 7;//eighth digit X 7
        $nine = $number[8] * 1;//last digit X 1

        //sum of all the above should be equal to a multiple of 10
        //ex. 150,160,170 etc.
        $sum = $one+$two+$three+$four+$five+$six+$seven+$eight+$nine;

        //check if its a multiple of 10
        if($sum % 10 === 0) {
            return $number;
        } else {
            return null;
        }
    }

    protected function tryCaRoutingNumber(string $value): ?string
    {
        $number = Sanitizer::stripWhitespaceAndDashes($value);

        $match = preg_match('~^0[0-9]{8}$~', $number); //9 digits, first one been 0

        if ($match) {
            return $number;
        } else {
            return null;
        }
    }
}
