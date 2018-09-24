<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;


class Money extends Decimal
{
    /**
     * @inheritDoc
     */
    protected function deinternalize($internalizedValue): ?string
    {
        return number_format((float) $internalizedValue, 2, '.', '');
    }
}
