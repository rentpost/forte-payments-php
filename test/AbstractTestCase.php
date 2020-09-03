<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test;

use PHPUnit\Framework\TestCase;
use Rentpost\ForteApi\Miscellaneous\InvokePrivateMethodTrait;

abstract class AbstractTestCase extends TestCase
{

    use InvokePrivateMethodTrait;
}
