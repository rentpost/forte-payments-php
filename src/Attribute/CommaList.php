<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Attribute;

use Rentpost\ForteApi\Exception\ValidationException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Pass this an array. It will automattically serialize to comma separated list
 *
 * @package Rentpost\ForteApi\Attribute
 */
class CommaList extends AbstractAttribute
{
    /**
     * {@inheritdoc}
     */
    protected function internalize($value): array
    {
        if ($value instanceof \Traversable || is_array($value)) {
            if ($value instanceof \Traversable) {
                $value = iterator_to_array($value);
            }

            return $value;
        }

        return explode(',', $value);

    }


    /**
     * @inheritDoc
     */
    protected function deinternalize($internalizedValue): ?string
    {
        return implode(',', $internalizedValue);
    }

}
