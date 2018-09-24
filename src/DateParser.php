<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi;

use Rentpost\ForteApi\Exception\LibraryFaultException;
use Rentpost\ForteApi\Exception\ValidationException;

/**
 * Forte API is not very consistent with the date and date time string formats it returns.
 * (Please note the API documentation formats shows is not consistent with what the actual API returns)
 *
 * In an idea scenario, the following formats would be returned:
 * Date and Time format: 2017-03-27T06:52:18
 * Date only format: 2017-03-27
 *
 * However sometimes date times strings are returned with fractional seconds.
 * These fraction of a second will be discarded
 */
class DateParser
{
    protected const DATE_TIME_PATTERN = '(\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2})';  // 2017-03-06T06:52:18
    public const DATE_TIME_FORMAT = 'Y-m-d\\TH:i:s';  // 2017-03-06T06:52:18

    protected const DATE_PATTERN = '(\\d{4}-\\d{2}-\\d{2})';  // 2017-03-06
    public const DATE_FORMAT = 'Y-m-d';  // 2017-03-06


    /**
     * You might want to use this if you only care about the date part, but
     * you might have a datetime string
     */
    public static function parseAny($dateOrDateTimeString): ?\DateTime
    {
        return self::parse($dateOrDateTimeString, 'any');
    }

    public static function parseDateTime($dateTimeString): ?\DateTime
    {
        return self::parse($dateTimeString, 'datetime');
    }

    public static function parseDate($dateString): ?\DateTime
    {
        return self::parse($dateString, 'date');
    }

    protected static function parse($dateOrDateTimeString, $expectedFormat): ?\DateTime
    {
        $dateOrDateTimeString = trim($dateOrDateTimeString);

        foreach (self::getPatternSets($expectedFormat) as $patternSet) {
            $isMatch = preg_match($patternSet['pattern'], $dateOrDateTimeString, $matches);

//dump('trying', $patternSet['pattern'], $dateOrDateTimeString);

            if ($isMatch) {
                $tidyDateTime = $matches[1]; // Fraction of seconds and/or useless timezone stripped out

                $datetime = \DateTime::createFromFormat('!' . $patternSet['format'], $tidyDateTime);

                if (!$datetime) {
                    throw new ValidationException(
                        'Date or datetime string not valid, but unusually is still matched a pattern. value passed was `' . $dateOrDateTimeString . '``'
                    );
                }

                return $datetime;

            }
        }


        throw new ValidationException(
            'Date or datetime string not valid. value passed was `' . $dateOrDateTimeString . '``'
        );
    }



    /**
     * Returns an array of regexs for the formats which are known to be returned by Forte API
     * The order is important with the most "narrow" pattern appearing first
     *
     * The first matched value should be in the format `2017-03-06T06:52:18`
     *
     * @return array
     */
    protected static function getPatternSets($expectedFormat): array
    {
        if (!in_array($expectedFormat, ['date', 'datetime', 'any'])) {
            throw new LibraryFaultException('unknown expected format');
        }

        /**
         * Returned from the API under the `search_criteria` property.
         *
         * This seems to be in in the following formats:
         * 2017-10-11T09:12:10.5607107-07:00
         * 2018-01-09T00:00:00-08:00
         *
         * The number of decimal points vary and sometimes decimal point is complete ommited.
         * But the `-NN:NN` on the end is distinct. These returned `search_criteria` date/time
         * values are not so critical, the obscure looking "timezone" thing on the end can be forgotten
         */
        if ($expectedFormat !== 'date') {
            $patternSets[] = [
                'pattern' => '~^' . self::DATE_TIME_PATTERN . '\\.?\\d*-\\d{2}:\\d{2}$~U',
                'format' => self::DATE_TIME_FORMAT,
            ];
        }

        /**
         * Format used in most other cases elsewhere in the API including hte "main" data
         *
         * 2017-11-01T07:49:38.033
         *
         * prettly standard looking datetime string except it unknown number of decimal
         * places. Sometimes decimal places is completely omitted. We are not concerned about
         * fractions of a second, so they are been stripped
         */
        if ($expectedFormat !== 'date') {
            $patternSets[] = [
                'pattern' => '~^' . self::DATE_TIME_PATTERN . '\\.?\\d*$~',
                'format' => self::DATE_TIME_FORMAT,
            ];
        }

        /**
         * Exactly `2017-03-27` format
         */
        if ($expectedFormat !== 'datetime') {
            $patternSets[] = [
                'pattern' => '~^' . self::DATE_PATTERN . '$~',
                'format' => self::DATE_FORMAT,
            ];
        }

        return $patternSets;
    }

}