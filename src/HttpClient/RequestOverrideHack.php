<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\HttpClient;

/**
 * @author Sam Anthony <sam@rentpost.com>
 *
 * This is a bit of a hack that allows Automated tests to bypass the HTTP request
 * to forte and instead pass specific JSON.
 */
class RequestOverrideHack
{
    static protected $overrideData = null;

    static public function setOverrideJson(string $json): void
    {
        self::$overrideData = $json;
    }

    static public function getOverrideJson(): ?string
    {
        $json = self::$overrideData;

        self::$overrideData = null;

        return $json;
    }

}