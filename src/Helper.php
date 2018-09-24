<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Helper functions
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Helper
{

    /**
     * Replace annoying 'underscored list' with a proper array
     *
     * @param array $entireArray    An array which may contain an 'underscored list'
     *                              as well as other data (which will not be effected)
     *                              $arr['line_item_1'] = 'something 1';
     *                              $arr['line_item_2'] = 'something 2';
     *                              $arr['line_item_3'] = 'something 3';
     *                              $arr['other_data'] = 'something else';
     * @param string $prefix        Prefix of the 'underscored list'. eg `line_item`
     * @param string $intendedKey   The key that the new array will have. eg `line_items`
     */
    public static function underscoredListItemsToArray(
        array $entireArray,
        string $prefix,
        string $intendedKey
    ): array
    {
        $corrected = [];

        foreach ($entireArray as $key => $value) {
            $pattern = '~^' . $prefix . '_([0-9])+$~';

            if (preg_match($pattern, $key, $matches)) {
                $numericKey = $matches[1];
                $extractedItems[$numericKey] = $value;
            } else {
                $corrected[$key] = $value;
            }
        }

        ksort($extractedItems); // Need to sort just in case the order of the items is wrong in the JSON
        $extractedItems = array_values($extractedItems); // Reindex array to 0 indexed array

        $corrected[$intendedKey] = $extractedItems;

        return $corrected;
    }


    /**
     * Perform an operation which is similar to the reverse of `underscoredListItemsToArray()`
     *
     * @param NormalizerInterface $normalizer
     * @param array $arr        The array we want to convert to an 'underscored list'
     * @param string $prefix    Prefix used in 'underscored list'
     */
    public static function underscoredListItemsToArrayReverse(
        NormalizerInterface $normalizer,
        array $arr,
        string $prefix
    ): array
    {
        $underscoredItems = [];
        $i = 1;
        foreach ($arr as $a) {
            $underscoredItems[$prefix . '_' . $i] = $normalizer->normalize($a);
            $i++;
        }

        return $underscoredItems;
    }
}
