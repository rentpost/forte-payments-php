<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Helper;

use Rentpost\ForteApi\Serializer\AmendableCamelCaseToSnakeCaseNameConverter;
use Rentpost\ForteApi\Serializer\Factory;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

class AmendableCamelCaseToSnakeCaseNameConverterTest extends AbstractUnitTestCase
{
    
    public function testConverter()
    {
        $factory = new Factory();

        $nameConverter = $this->invokePrivateMethod($factory, 'makeNameConverter', []);

        $this->assertInstanceOf(AmendableCamelCaseToSnakeCaseNameConverter::class, $nameConverter);

        // Test `normalize`
        $this->assertEquals('account_number', $nameConverter->normalize('accountNumber'));
        $this->assertEquals('dba_name', $nameConverter->normalize('dbaName'));
        $this->assertEquals('organization_id', $nameConverter->normalize('organizationId'));
        $this->assertEquals('street_address1', $nameConverter->normalize('streetAddress1'));
        $this->assertEquals('label', $nameConverter->normalize('label'));
        $this->assertEquals('last4_ssn', $nameConverter->normalize('last4Ssn'));
        $this->assertEquals('last_4_account_number', $nameConverter->normalize('last4AccountNumber'));
        $this->assertEquals('original_transaction_id', $nameConverter->normalize('originalTransactionId'));
        $this->assertEquals('risk_session_id', $nameConverter->normalize('riskSessionId'));
        $this->assertEquals('t_and_c_version', $nameConverter->normalize('tAndCVersion'));
        $this->assertEquals('website', $nameConverter->normalize('website'));

        // Test `denormalize`
        $this->assertEquals('email', $nameConverter->denormalize('email'));
        $this->assertEquals('locationId', $nameConverter->denormalize('location_id'));
        $this->assertEquals('last4Ssn', $nameConverter->denormalize('last4_ssn'));
        $this->assertEquals('last4AccountNumber', $nameConverter->denormalize('last_4_account_number'));
        $this->assertEquals('nameOnCard', $nameConverter->denormalize('name_on_card'));
        $this->assertEquals('streetLine2', $nameConverter->denormalize('street_line2'));
    }
}
