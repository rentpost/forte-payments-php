<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

class AddressToken extends AbstractId
{

    protected function getIdPrefix(): string
    {
        return 'add';
    }
}
