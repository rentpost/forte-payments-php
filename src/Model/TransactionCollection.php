<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TransactionCollection
 * 
 * @author Sam Anthony <sam@rentpost.com>
 */
class TransactionCollection extends AbstractResultCollection
{
    
    /**
     * @internal only here so the Symfony serializer can detect the typehints
     *
     * @param Transaction $transaction
     */
    public function addResult(Transaction $transaction)
    {
    }
}
