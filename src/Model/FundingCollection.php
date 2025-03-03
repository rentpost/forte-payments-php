<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Model\Funding;

/**
 * FundingCollection
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class FundingCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     */
    public function addResult(Funding $funding): void
    {
    }
}
