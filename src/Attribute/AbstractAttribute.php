<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Abstract Attribute class
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractAttribute implements NormalizableInterface, DenormalizableInterface
{

    protected const VALUE_OMMITED = '__VALUE_OMMITED__';


    /**
     * @var mixed This the actual value of this attribute. It is stored in the most practical format
     *            e.g. a phone number might be stored as a string with white space trimmed, an "array like
     *            attribute" could be stored as a PHP array, and a date related attribute might be stored
     *            as PHP `\DateTime` object
     */
    protected mixed $internalizedValue;


    /**
     * When the serializer instantiates, it will not pass any arguments, the value instead will be
     * set later by the serializer via `setValueViaSerializer()`.
     *
     * When the programmer wants to instantiate this they should pass a value.
     *
     * @param string $value
     */
    public function __construct($value = self::VALUE_OMMITED)
    {
        if ($value !== self::VALUE_OMMITED) {
            $this->internalizedValue = $this->internalize($value);
        }
    }


    /**
     * Should be able to accept argument that a programmer might use but
     * also needs to handle strings from the serializer
     *
     * @return mixed internalized value
     */
    abstract protected function internalize(mixed $value): mixed;


    /**
     * Converts the internalizedValue into a string suitable
     * for the serializer to use in JSON which is sent to Forte API
     * Override this in child classes as needed
     */
    protected function deinternalize(mixed $internalizedValue): ?string
    {
        return $internalizedValue;
    }


    protected function setValueViaSerializer($value): void
    {
        $this->internalizedValue = $this->internalize($value);
    }


    /**
     * Gets the raw value of the attribute. Use this to get the real deal
     */
    public function getValue(): ?string
    {
        return $this->deinternalize($this->internalizedValue);
    }


    /**
     * @internal this is invoked by the serializer (NormalizableInterface)
     *
     * @param mixed[] $context
     */
    public function normalize(
        NormalizerInterface $normalizer,
        ?string $format = null,
        array $context = [],
    ): array|string|int|float|bool {
        return $this->deinternalize($this->internalizedValue);
    }


    /**
     * @internal this is invoked by the serializer (DenormalizableInterface)
     *
     * @param mixed[] $context
     */
    public function denormalize(
        DenormalizerInterface $denormalizer,
        array|string|int|float|bool $data,
        ?string $format = null,
        array $context = [],
    ): void {
        $this->setValueViaSerializer($data);
    }
}
