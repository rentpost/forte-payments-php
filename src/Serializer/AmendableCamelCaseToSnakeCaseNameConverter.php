<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

/**
 * This extends the `CamelCaseToSnakeCaseNameConverter`, it allows for a few
 * amendments/exceptions to the conversion rules which can be specified via `addAmendment()`
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class AmendableCamelCaseToSnakeCaseNameConverter extends CamelCaseToSnakeCaseNameConverter
{

    /**
     * Array in the format $arr[ denormalized ] = normalized
     */
    protected array $amendments;


    /**
     * @param string $denormalized  Camel case name (denormalized name).
     * @param string $normalized    Underscored name (normalized name)
     */
    public function addAmendment(string $denormalized, string $normalized): self
    {
        $this->amendments[$denormalized] = $normalized;

        return $this;
    }


    /**
     * {@inheritdoc}
     *
     * @param string $propertyName  Camel case name
     */
    public function normalize(string $propertyName): string
    {
        if (isset($this->amendments[$propertyName])) {
            return $this->amendments[$propertyName];
        }

        return parent::normalize($propertyName);
    }


    /**
     * {@inheritdoc}
     *
     * @param string $propertyName  Underscored name
     */
    public function denormalize(string $propertyName): string
    {
        $invertedAmendments = array_flip($this->amendments);

        if (isset($invertedAmendments[$propertyName])) {
            return $invertedAmendments[$propertyName];
        }

        return parent::denormalize($propertyName);
    }
}
