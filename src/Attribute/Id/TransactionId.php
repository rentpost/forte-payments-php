<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

use Rentpost\ForteApi\Exception\ValidationException;

class TransactionId extends AbstractId
{
    protected function getIdPrefix(): string
    {
        return 'trn';
    }


    protected function internalize($value): string
    {
        if (strlen($value) > 40) { // 36 characters + 4 for `trn_` prefix
            throw new ValidationException('length should not exceed 40 characters');
        }

        return parent::internalize($value);
    }

}
