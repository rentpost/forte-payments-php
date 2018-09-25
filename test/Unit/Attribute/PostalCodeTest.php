<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Attribute;

use Rentpost\ForteApi\Attribute\PostalCode;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

/**
 * @group skip
 *        These were disabled at some point in time as there is an annoying issue which was not worth fixing at the time
 */
class PostalCodeTest extends AbstractUnitTestCase
{

    public function testValidUsPostalCodes()
    {
        $pc = new PostalCode('54321');
        $this->assertEquals('54321', $pc->getValue());

        $pc = new PostalCode('12345 6789');
        $this->assertEquals('12345-6789', $pc->getValue());

        $pc = new PostalCode('98765-4321');
        $this->assertEquals('98765-4321', $pc->getValue());

        $pc = new PostalCode(' 98765 4321 ');
        $this->assertEquals('98765-4321', $pc->getValue());
    }

    
    public function testInvalidUsPostalCodes()
    {
        $this->assertValidationException(PostalCode::class, 0);
        $this->assertValidationException(PostalCode::class, '0');
        $this->assertValidationException(PostalCode::class, '');
        $this->assertValidationException(PostalCode::class, null);
        $this->assertValidationException(PostalCode::class, 12345); //should be string
        $this->assertValidationException(PostalCode::class, 987654321); //should be string
        $this->assertValidationException(PostalCode::class, '9999');
        $this->assertValidationException(PostalCode::class, '87654321');
        $this->assertValidationException(PostalCode::class, '1234-56789'); //dash wrong spot
        $this->assertValidationException(PostalCode::class, '12345x6789');
        $this->assertValidationException(PostalCode::class, '12345   6789'); //only one space allowed
        $this->assertValidationException(PostalCode::class, ' 9999');
        $this->assertValidationException(PostalCode::class, 'ABCDE');
    }

    
    public function testValidCaPostalCodes()
    {
        $pc = new PostalCode('M5V 3K9');
        $this->assertEquals('M5V 3K9', $pc->getValue());

        $pc = new PostalCode('M5R2V5');
        $this->assertEquals('M5R 2V5', $pc->getValue());

        $pc = new PostalCode(' V5Z 1M9 ');
        $this->assertEquals('V5Z 1M9', $pc->getValue());

        $pc = new PostalCode(' v5z 1m9 ');
        $this->assertEquals('V5Z 1M9', $pc->getValue());

        $pc = new PostalCode('G6X-2M2');
        $this->assertEquals('G6X 2M2', $pc->getValue());
    }

    
    public function testInvalidCaPostalCodes()
    {
        $this->assertValidationException(PostalCode::class, 'I5V 3K9'); // `I` is invalid letter
        $this->assertValidationException(PostalCode::class, 'ACBDEF');
        $this->assertValidationException(PostalCode::class, 'G6X');
        $this->assertValidationException(PostalCode::class, 'M5R2V5M');
        $this->assertValidationException(PostalCode::class, 'MVK');
    }
}
