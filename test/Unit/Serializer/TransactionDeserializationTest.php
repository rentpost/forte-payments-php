<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Serializer;

use Rentpost\ForteApi\Model\Transaction;
use Rentpost\ForteApi\Serializer\Factory as SerializerFactory;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

/**
 * A transaction Forte returns is read with the fields only Forte sets, as the sandbox returns them
 */
class TransactionDeserializationTest extends AbstractUnitTestCase
{

    public function testReadsFieldsForteSets(): void
    {
        $json = json_encode([
            'transaction_id' => 'trn_c35514bc-3a9d-402d-8f6e-392c0603c404',
            'location_id' => 'loc_228393',
            'action' => 'sale',
            'status' => 'settled',
            'authorization_amount' => 68,
            'received_date' => '2026-08-08T20:45:32.983',
            'attempt_number' => 1,
        ], JSON_THROW_ON_ERROR);

        $transaction = (new SerializerFactory)->make()->deserialize($json, Transaction::class, 'json');

        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertSame('2026-08-08T20:45:32', $transaction->getReceivedDate()?->getValue());
        $this->assertSame(1, $transaction->getAttemptNumber());
    }
}
