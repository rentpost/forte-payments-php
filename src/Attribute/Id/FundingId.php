<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

class FundingId extends AbstractId
{
    protected function getIdPrefix(): string
    {
        return 'fnd';
    }

}
