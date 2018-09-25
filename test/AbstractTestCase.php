<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test;

use PHPUnit\Framework\TestCase;
use Rentpost\ForteApi\Miscellaneous\InvokePrivateMethodTrait;
use VladaHejda\AssertException;

abstract class AbstractTestCase extends TestCase
{
    
    use AssertException;
    use InvokePrivateMethodTrait;
}
