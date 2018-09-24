<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Sanitizer;

class BankAccountNumber extends AbstractAttribute
{

    /**
     * {@inheritdoc}
     */
    protected function internalize($value): string
    {
        return Sanitizer::stripWhitespaceAndDashes($value);
    }
}
