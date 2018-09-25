<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Unit\Other;

use Rentpost\ForteApi\Helper;
use Rentpost\ForteApi\Test\Unit\AbstractUnitTestCase;

class HelperTest extends AbstractUnitTestCase
{
    
    public function testUnderscoredListItemsToArray()
    {
        $input = [
            'first_name' => 'John',
            'last_name' => 'Smith',
            'child_1' => 'Jane',
            'child_3' => 'Paul',    // Numeric order of keys intentionally wrong
            'child_2' => 'Andrew',
            'cars' => ['Ford', 'Volvo'],
        ];

        $expected = [
            'first_name' => 'John',
            'last_name' => 'Smith',
            'cars' => ['Ford', 'Volvo'],
            'children' => ['Jane', 'Andrew', 'Paul'],
            // The exacted items are placed in array at the bottom.
            // This is not intentional just a result of how things are implemented
        ];

        $output = Helper::underscoredListItemsToArray($input, 'child', 'children');

        $this->assertEquals($expected, $output);
    }
}
