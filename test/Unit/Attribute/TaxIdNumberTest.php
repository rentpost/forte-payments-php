<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Attribute;

use Rentpost\ForteApi\Attribute\TaxIdNumber;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;


class TaxIdNumberTest extends AbstractUnitTestCase
{

    public function testValid()
    {
        $a = new TaxIdNumber('123456789');
        $this->assertEquals('123456789', $a->getValue());

        $a = new TaxIdNumber('123-456-789');
        $this->assertEquals('123456789', $a->getValue());

        $a = new TaxIdNumber(' 123 456 789  ');
        $this->assertEquals('123456789', $a->getValue());
    }

    
    public function testInvalid()
    {
        $this->assertValidationException(TaxIdNumber::class, 123456789);
        $this->assertValidationException(TaxIdNumber::class, '12345678');
        $this->assertValidationException(TaxIdNumber::class, '12345678X');
    }
}
