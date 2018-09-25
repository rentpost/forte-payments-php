<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Attribute;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;


class DateTimeTest extends AbstractUnitTestCase
{

    public function testValid()
    {
        $a = new DateTime('2017-10-11T09:12:10.5607107-07:00');
        $this->assertEquals('2017-10-11T09:12:10', $a->getValue());

        $a = new DateTime('2017-11-01T07:49:38.033');
        $this->assertEquals('2017-11-01T07:49:38', $a->getValue());

        $a = new DateTime('2003-11-01T17:34:26.32');
        $this->assertEquals('2003-11-01T17:34:26', $a->getValue());

        $a = new DateTime('1999-01-09T09:12:10.5607107-08:00');
        $this->assertEquals('1999-01-09T09:12:10', $a->getValue());

        $a = new DateTime('2017-10-10T00:00:00-07:00');
        $this->assertEquals('2017-10-10T00:00:00', $a->getValue());

        $a = new DateTime('2017-10-03T16:52:16.537');
        $this->assertEquals('2017-10-03T16:52:16', $a->getValue());

        $a = new DateTime('2011-10-05T09:13:34.3');
        $this->assertEquals('2011-10-05T09:13:34', $a->getValue());

        $a = new DateTime(\DateTime::createFromFormat('d-m-Y H:i:s', '22-04-2001 15:02:45'));
        $this->assertEquals('2001-04-22T15:02:45', $a->getValue());
    }

    
    public function testInvalid()
    {
        $this->assertValidationException(DateTime::class, null);
        $this->assertValidationException(DateTime::class, 0);
        $this->assertValidationException(DateTime::class, '');
        $this->assertValidationException(DateTime::class, 123456789);
        $this->assertValidationException(DateTime::class, 'now');
        $this->assertValidationException(DateTime::class, '2003\11\02');
        $this->assertValidationException(DateTime::class, '22-04-2001 15:02:45');
    }
}
