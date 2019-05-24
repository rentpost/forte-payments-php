<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

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
            throw new ValidationException('Account number must not evaluate to false');
        }

        return Sanitizer::stripWhitespaceAndDashes($value);
    }
}
