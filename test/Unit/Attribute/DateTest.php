<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Attribute;

use Rentpost\ForteApi\Attribute\Date;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;


class DateTest extends AbstractUnitTestCase
{

    public function testValid()
    {
        $a = new Date('2003-11-21');
        $this->assertEquals('2003-11-21', $a->getValue());

        $a = new Date('1999-03-26');
        $this->assertEquals('1999-03-26', $a->getValue());

        $a = new Date('  2008-06-01  ');
        $this->assertEquals('2008-06-01', $a->getValue());

        $a = new Date(\DateTime::createFromFormat('d-m-Y', '29-06-2016'));
        $this->assertEquals('2016-06-29', $a->getValue());
    }

    
    public function testInvalid()
    {
        $this->assertValidationException(Date::class, null);
        $this->assertValidationException(Date::class, 0);
        $this->assertValidationException(Date::class, '');
        $this->assertValidationException(Date::class, 123456789);
        $this->assertValidationException(Date::class, 'now');
        $this->assertValidationException(Date::class, '01-01-2016');
        $this->assertValidationException(Date::class, '2003\11\02');
    }
}
