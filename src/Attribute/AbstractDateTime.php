<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;

/**
 * Abstract DateTime class
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
abstract class AbstractDateTime extends AbstractAttribute
{

    /**
     * Valid PHP DateTime format specifier
     * http://php.net/manual/en/datetime.createfromformat.php
     *
     * @return string
     */
    abstract protected function getOutputFormat(): string;


    abstract protected function handleStringInput(string $string): \DateTime;


    /**
     * @inheritDoc
     */
    protected function internalize($value): \DateTime
    {
        if ($value instanceof \DateTime) {
            return $value;
        }

        if (is_string($value)) {
            return $this->handleStringInput($value);
        }

        throw new ValidationException('Input must be string or \DateTime object');
    }


    /**
     * @inheritDoc
     */
    protected function deinternalize($internalizedValue): ?string
    {
        if ($internalizedValue) {
            return $internalizedValue->format($this->getOutputFormat());
        }
        
        return null;
    }
}
