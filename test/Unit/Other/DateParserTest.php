<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Other;

use Rentpost\ForteApi\Attribute\Date;
use Rentpost\ForteApi\DateParser;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

/**
 * @group current
 */
class DateParserTest extends AbstractUnitTestCase
{
    
    public function testValid()
    {
        // "Any"
        $this->assertDateParserAny('2017-03-06T06:52:18', '2017-03-06T06:52:18');
        $this->assertDateParserAny('2017-10-11T09:12:10', '2017-10-11T09:12:10.5607107-07:00');
        $this->assertDateParserAny('2018-01-09T00:00:00', '2018-01-09T00:00:00-08:00');
        $this->assertDateParserAny('2012-06-23T00:00:00', '2012-06-23');

        // "Date only"
        $this->assertDateParserDate('2012-06-23', '2012-06-23');
        $this->assertDateParserDate('1684-12-01', '1684-12-01');

        // "Date time only"
        $this->assertDateParserDateTime('2017-03-06T06:52:18', '2017-03-06T06:52:18');

    }

    
    public function testInvalid()
    {
        // "Any"
        $this->assertException( function() { DateParser::parseAny('2017-03');}, ValidationException::class);
        $this->assertException( function() { DateParser::parseAny('2017-10-11T09:12:10.5607107X');}, ValidationException::class);
        $this->assertException( function() { DateParser::parseAny('2012-06-23T');}, ValidationException::class);

        // "Date only"
        $this->assertException( function() { DateParser::parseDate('2017-03-06T06:52:18');}, ValidationException::class);

        // "Date time only"
        $this->assertException( function() { DateParser::parseDateTime('2017-03-06');}, ValidationException::class);
    }

    
    protected function assertDateParserAny(string $expected, string $input)
    {
        $dateTime = DateParser::parseAny($input);

        $this->assertInstanceOf(\DateTime::class, $dateTime);
        $this->assertEquals($expected, $dateTime->format(DateParser::DATE_TIME_FORMAT));
    }

    
    protected function assertDateParserDate(string $expected, string $input)
    {
        $dateTime = DateParser::parseDate($input);

        $this->assertInstanceOf(\DateTime::class, $dateTime);
        $this->assertEquals($expected, $dateTime->format(DateParser::DATE_FORMAT));
    }

    
    protected function assertDateParserDateTime(string $expected, string $input)
    {
        $dateTime = DateParser::parseDateTime($input);

        $this->assertInstanceOf(\DateTime::class, $dateTime);
        $this->assertEquals($expected, $dateTime->format(DateParser::DATE_TIME_FORMAT));
    }
}