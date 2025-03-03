<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

/**
 * SettlementCollection
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class SettlementCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     */
    public function addResult(Settlement $settlement): void
    {
    }
}
