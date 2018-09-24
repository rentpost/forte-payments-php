<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Serializer\ForteNormalizer;

/**
 * @author Sam Anthony <sam@rentpost.com>
 */
interface PreProcessDenormalizationInterface
{
    /**
     * @internal Do not call this directly, it will be called by `ForteObjectNormalizer`
     *
     * @param $data a scalar value or array. This is the data used to "build" the object
     *
     * Sometimes the data been presented is not quite in a useful state to "build" the object
     *
     * For example,
     *
     * $arr = ['fruit_1' => 'Apple', 'fruit_2' = 'banana']; would not be so useful to "build"
     * an object which has a property of `fruits`. We can use this method to preprocess the data before
     * its used by the serializer to be denormalized.
     *
     * @return mixed adjusted scalar value or array ready for denormalization
     */
    public static function preProcessDataForDenormalization($data): array;
}
