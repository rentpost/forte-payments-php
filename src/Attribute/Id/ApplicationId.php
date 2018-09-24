<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

class ApplicationId extends DocumentResourceId
{
    protected function getIdPrefix(): string
    {
        return 'app';
    }

}
