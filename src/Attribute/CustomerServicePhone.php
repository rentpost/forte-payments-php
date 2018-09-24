<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Sanitizer;

class CustomerServicePhone extends AbstractPhone
{
    /**
     * {@inheritdoc}
     */
    protected function internalize($value): string
    {
        $phone = Sanitizer::stripNonNumeric($value);

        if (strlen($phone) !== 10 && strlen($phone) !== 11) {
            throw new ValidationException('customer service phone invalid. Sanitized = ' . $phone);
        }

        return $phone;
    }
}
