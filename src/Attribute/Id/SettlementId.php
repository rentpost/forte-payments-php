<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

class SettlementId extends AbstractId
{
    protected function getIdPrefix(): string
    {
        return 'stl';
    }

}
