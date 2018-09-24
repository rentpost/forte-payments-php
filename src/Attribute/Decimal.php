<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;


class Decimal extends AbstractAttribute
{
    /**
     * @inheritDoc
     */
    protected function internalize($value): string
    {
        //Note: its better to store this decimal values as a string rather than a float
        $value = trim((string) $value);

        if (!is_numeric($value) ) {
            throw new ValidationException('must be numeric');
        }

        return $value;
    }
}
