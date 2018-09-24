<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;

class IpAddress extends AbstractAttribute
{
    /**
     * @inheritDoc
     */
    protected function internalize($value): string
    {
        return $value;
    }
}
