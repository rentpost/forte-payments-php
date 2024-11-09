<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Sanitizer;

/**
 * Account number for a bank account
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class BankAccountNumber extends AbstractAttribute
{

    /**
     * {@inheritdoc}
     */
    protected function internalize($value): string
    {
        if (!$value) {
            throw new ValidationException('A valid bank account number must be provided');
        }

        return Sanitizer::stripWhitespaceAndDashes($value);
    }
}
