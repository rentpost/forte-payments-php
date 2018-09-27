<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer\ForteNormalizer;

use Rentpost\ForteApi\Exception\LibraryGenericException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * This adds additional functionality onto `ObjectNormalizer`
 * see `PreProcessDenormalizationInterface.php`
 */
class ForteObjectNormalizer extends ObjectNormalizer
{

    /**
     * @param string $class fqcn.
     *
     * @internal
     */
    protected function isPreProcessDenormalizationInterface(string $class): bool
    {
        try {
            $reflection = new \ReflectionClass($class);

            return $reflection->implementsInterface(PreProcessDenormalizationInterface::class);
        } catch (\ReflectionException $e) {
            throw new LibraryGenericException('argument passed must be a string of a valid class name', 0, $e);
        }
    }


    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $normalizedData = $this->prepareForDenormalization($data);

        if ($this->isPreProcessDenormalizationInterface($class)) {
            $normalizedData = $class::preProcessDataForDenormalization($normalizedData);
        }

        return parent::denormalize($normalizedData, $class, $format, $context);
    }


    /**
     * Normalizes an object
     *
     * @param object $object
     * @param string|null $format
     * @param array $context
     *
     * @return array
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = parent::normalize($object, $format, $context);

        // Remove properties with `null` values
        return array_filter($data, function($value) {
            return ($value !== null);
        });
    }
}
