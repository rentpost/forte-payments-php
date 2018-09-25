<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Miscellaneous;

/**
 * Responsible for transforming between case-styles
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Inflector
{

    /**
     * Sanitizes the filename
     *
     * @param string|null $dirtyFileName
     */
    public static function sanitizeFileName(?string $dirtyFileName): string
    {
        $fileName = strtolower($dirtyFileName);

        // Replace anything that is not an alphanumeric or a dash with underscore
        // Dashes are been allowed, otherwise file names with dates might look funny
        $fileName = preg_replace('~[^a-z0-9-]+~', '_', $fileName);

        // Remove underscore from start and end of file name
        $fileName = preg_replace('~(^_+|_+$)~', '', $fileName);

        return $fileName;
    }
}
