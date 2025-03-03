<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

/**
 * DisputeCollection
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class DisputeCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     */
    public function addResult(Dispute $dispute): void
    {
    }
}
