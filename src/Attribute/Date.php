<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\DateParser;
use Rentpost\ForteApi\Exception\ValidationException;

/**
 * Abstract Date class
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Date extends AbstractDateTime
{

    protected function handleStringInput(string $value): \DateTime
    {
        $datetime = DateParser::parseAny($value);

        if (!$datetime) {
            throw new ValidationException('cannot parse date or datetime string');
        }

        return $datetime;
    }


    protected function getOutputFormat(): string
    {
        return 'Y-m-d';
    }
}
