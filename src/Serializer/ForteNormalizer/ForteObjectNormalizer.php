<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer\ForteNormalizer;

use Rentpost\ForteApi\Exception\LibraryGenericException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * Adapts the `ObjectNormalizer`.
 * @see `PreProcessDenormalizationInterface.php`
 */
class ForteObjectNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{

    public function __construct(
        private ObjectNormalizer $normalizer,
    ) {}


    /**
     * @param class-string $class
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


    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->normalizer->setSerializer($serializer);
    }


    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function denormalize(
        mixed $data,
        string $class,
        ?string $format = null,
        array $context = [],
    ): mixed
    {
        $normalizedData = (array)$data;

        if ($this->isPreProcessDenormalizationInterface($class)) {
            $normalizedData = $class::preProcessDataForDenormalization($normalizedData);
        }

        return $this->normalizer->denormalize($normalizedData, $class, $format, $context);
    }


    public function supportsDenormalization(
        mixed $data,
        string $type,
        ?string $format = null,
        array $context = [],
    ): bool
    {
        return $this->normalizer->supportsDenormalization($data, $type, $format, $context);
    }


    /**
     * Normalizes an object
     *
     * @param array<string, mixed> $context
     *
     * @return array<string, mixed>
     */
    public function normalize(
        mixed $object,
        ?string $format = null,
        array $context = [],
    ): array
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        // Remove properties with `null` values
        return array_filter($data, fn ($value): bool => $value !== null);
    }


    public function supportsNormalization(
        mixed $data,
        ?string $format = null,
        array $context = [],
    ): bool
    {
        return $this->normalizer->supportsNormalization($data, $format, $context);
    }


    /** @return array<string,bool> */
    public function getSupportedTypes(?string $format): array
    {
        return ['object' => true];
    }
}
