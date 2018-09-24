<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

class PaymethodToken extends AbstractId
{
    protected function getIdPrefix(): string
    {
        return 'mth';
    }

}
