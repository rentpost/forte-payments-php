<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Miscellaneous;

/**
 * Automated tests in both the main application and the Forte Client library needed
 * the ability to invoke private/protected methods.
 */
trait InvokePrivateMethodTrait
{

    /**
     * https://jtreminio.com/2013/03/unit-testing-tutorial-part-3-testing-protected-private-methods-coverage-reports-and-crap/
     *
     * Call protected/private method of a class.
     *
     * @param object $object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    protected function invokePrivateMethod($object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    
    /**
     * https://jtreminio.com/2013/03/unit-testing-tutorial-part-3-testing-protected-private-methods-coverage-reports-and-crap/
     *
     * Call protected/private method of a class.
     *
     * @param string $fqcn Class name
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    protected function invokePrivateStaticMethod(string $fqcn, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass($fqcn);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs(null, $parameters);
    }
}
