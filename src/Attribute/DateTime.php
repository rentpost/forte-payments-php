<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\DateParser;
use Rentpost\ForteApi\Exception\ValidationException;

class DateTime extends AbstractDateTime
{
    protected const BASE_FORMAT = 'Y-m-d\\TH:i:s';  // 2017-03-06T06:52:18

    /**
     * #forte-api-quirk January 2018: The datetime strings returned from Forte are not consistent and to format
     *                  used in the documentation is wrong. Often times are expressed in fractions of seconds,
     *                  with no consistancy to the number of decimal places.
     *                  However the no-fractional part of the date/time string is always in the format `2017-03-06T06:52:18`
     *
     * @param string $value
     *
     * @return \DateTime
     * @throws ValidationException
     */
    protected function handleStringInput(string $value): \DateTime
    {
        $datetime = DateParser::parseDateTime($value);

        if (!$datetime) {
            throw new ValidationException('cannot parse datetime string');
        }

        return $datetime;
    }



    protected function getOutputFormat(): string
    {
        return self::BASE_FORMAT;
    }
}
