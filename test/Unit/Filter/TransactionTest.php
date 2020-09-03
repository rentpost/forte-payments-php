<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Helper;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Filter\TransactionFilter;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

class TransactionTest extends AbstractUnitTestCase
{

    public function testFilterInvalid()
    {
        $this->expectException(ValidationException::class);

        $filter = new TransactionFilter();
        $filter->setStartReceivedDate(new Attribute\Date('1990-01-01'));

        UriBuilder::build('', [], $filter);
    }


    public function testFilterInvalidTwo()
    {
        $this->expectException(ValidationException::class);

        $filter = new TransactionFilter();
        $filter
            ->setStartReceivedDate(new Attribute\Date('1990-01-01'))
            ->setEndReceivedDate(new Attribute\Date('2000-01-01'))
            ->setEndOriginationDate(new Attribute\Date('2000-01-01'));

        UriBuilder::build('', [], $filter);
    }
}
