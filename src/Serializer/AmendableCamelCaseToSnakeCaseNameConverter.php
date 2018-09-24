<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * Thi extends the `CamelCaseToSnakeCaseNameConverter`, it allows for a few
 * amendments/exceptions to the conversion rules which can be specified via `addAmendment()`
 */
class AmendableCamelCaseToSnakeCaseNameConverter extends CamelCaseToSnakeCaseNameConverter
{

    /**
     * Array in the format $arr[ denormalized ] = normalized
     *
     * @var array
     */
    protected $amendments;


    /**
     * @param string $denormalized camel case name (denormalized name).
     * @param string $normalized underscored name (normalized name)
     *
     * @return self
     */
    public function addAmendment(string $denormalized, string $normalized): self
    {
        $this->amendments[$denormalized] = $normalized;

        return $this;
    }


    /**
     * {@inheritdoc}
     *
     * @param string $propertyName camel case name
     *
     * @return mixed|string
     */
    public function normalize($propertyName)
    {
        if (isset($this->amendments[$propertyName])) {
            return $this->amendments[$propertyName];
        }

        return parent::normalize($propertyName);
    }


    /**
     * {@inheritdoc}
     *
     * @param string $propertyName underscored name
     *
     * @return mixed|string
     */
    public function denormalize($propertyName)
    {
        $invertedAmendments = array_flip($this->amendments);

        if (isset($invertedAmendments[$propertyName])) {
            return $invertedAmendments[$propertyName];
        }

        return parent::denormalize($propertyName);
    }

}
