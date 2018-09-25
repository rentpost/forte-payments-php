<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit;

use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\AbstractTestCase;

abstract class AbstractUnitTestCase extends AbstractTestCase
{
    
    /**
     * Assert that the provided Attrbute/Value combination throws appropriate exception
     *
     * This method was created as an alternative to using `expectException()` which checks
     * that an entire test throws an exception. using `expectException()` if would not be possible
     * to assert for exception multiple times in one test
     *
     * @param string $attributeFqcn The class name of the attribute we want to try
     * @param $attributeValue The value passed to the attribute constructor
     */
    protected function assertValidationException(string $attributeFqcn, $attributeValue )
    {
        global $attributeFqnsGlobal;
        global $attributeValueGlobal;

        $attributeFqnsGlobal = $attributeFqcn;
        $attributeValueGlobal = $attributeValue;


        $this->assertException(
            function()
            {
                // Just instantiating the attribute is enough to cause the exception
                global $attributeFqnsGlobal, $attributeValueGlobal;
                $a = new $attributeFqnsGlobal($attributeValueGlobal);
            },
            ValidationException::class
        );
    }
}
