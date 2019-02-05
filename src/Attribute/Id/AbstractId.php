<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute\Id;

use Rentpost\ForteApi\Attribute\AbstractAttribute;
use Rentpost\ForteApi\Exception\ValidationException;

abstract class AbstractId extends AbstractAttribute
{

    abstract protected function getIdPrefix(): string;


    protected function internalize($value): string
    {
        if (!is_string($value)) {
            throw new ValidationException(
                'id value must be a string. `' . gettype($value) . '` was passed. ' .
                'Class name = `' . get_class($this) . '`'
            );
        }

        $chunks = explode('_', $value);

        if (count($chunks) !== 2) {
            throw new ValidationException($this->getExceptionMessage($value));
        }

        if ($chunks[0] !== $this->getIdPrefix()) {
            throw new ValidationException($this->getExceptionMessage($value));
        }

        return $value;
    }

    
    protected function getExceptionMessage($value)
    {
        return 'Forte identifier invalid. Expected format `' .
                $this->getIdPrefix() . '_?????????`. Provided value was `' . $value . '`';
    }
}
