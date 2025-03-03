<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

/**
 * TransactionCollection
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class TransactionCollection extends AbstractResultCollection
{

    /**
     * @internal only here so the Symfony serializer can detect the typehints
     */
    public function addResult(Transaction $transaction): void
    {
    }
}
