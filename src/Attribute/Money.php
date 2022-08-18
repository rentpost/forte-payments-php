<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;


class Money extends Decimal
{
    /**
     * @inheritDoc
     */
    protected function deinternalize($internalizedValue): ?string
    {
        $amount = (string)$internalizedValue;
        $amountParts = explode('.', $amount);
        if (count($amountParts) === 2) {
            // x.00
            if ($amountParts[1] == 0) {
                return number_format((float)$amount, 0, '.', '');
            }

            // x.50 return as x.5
            if (\str_ends_with($amountParts[1], '0')) {
                return number_format((float)$amount, 1, '.', '');
            }
        }

        return number_format((float)$amount, 2, '.', '');
    }
}
