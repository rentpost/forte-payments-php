<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;

class PostalCode extends AbstractAttribute
{

    /**
     * Credit card payments are accepted from all countries, therefore, this must support
     * postal codes for all countries.
     *
     * Currently we're not performing any validation
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
     * @param string $value
     */
    protected function internalize($value): string
    {
        if (!is_string($value)) {
            throw new ValidationException('Postal codes must be passed as a string');
        }

        return $value;
    }
}
