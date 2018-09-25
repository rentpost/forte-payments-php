<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Attribute;

use Rentpost\ForteApi\Attribute\BankRoutingNumber;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

class BankRoutingNumberTest extends AbstractUnitTestCase
{

    public function testValidUsRoutingNubers()
    {
        $a = new BankRoutingNumber('111000258');
        $this->assertEquals('111000258', $a->getValue());

        $a = new BankRoutingNumber('111 000 258');
        $this->assertEquals('111000258', $a->getValue());

        $a = new BankRoutingNumber('263170175');
        $this->assertEquals('263170175', $a->getValue());

        $a = new BankRoutingNumber('2631-70175');
        $this->assertEquals('263170175', $a->getValue());
    }

    
    public function testInvalidUsRoutingNumbers()
    {
        //$this->assertValidationException(BankRoutingNumber::class, 111000258); //not string
        $this->assertValidationException(BankRoutingNumber::class, '293170175'); // Bad checksum
        $this->assertValidationException(BankRoutingNumber::class, 'A67014822'); // Invalid
    }

    
    public function testValidCaRoutingNubers()
    {
        $a = new BankRoutingNumber('067014822');
        $this->assertEquals('067014822', $a->getValue());

        $a = new BankRoutingNumber('036102332');
        $this->assertEquals('036102332', $a->getValue());
    }
}
