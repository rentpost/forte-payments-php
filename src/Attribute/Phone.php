<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

class Phone extends AbstractPhone
{
    /**
     * @inheritDoc
     */
    protected function internalize($value): string
    {
        return $value;
    }
}
