<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\UriBuilder;

use Rentpost\ForteApi\Exception\LibraryFaultException;
use Rentpost\ForteApi\Filter\AbstractFilter;
use Rentpost\ForteApi\ValidatingSerializer\ValidatingSerializer;

/**
 * Builds out a URI
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class UriBuilder
{

    /**
     * Gets a filtered string
     *
     * @param AbstractFilter $filter
     * @param ValidatingSerializer $validatingSerializer
     */
    static private function getFilterString(
        AbstractFilter $filter,
        ValidatingSerializer $validatingSerializer
    ): string
    {
        $filters = $validatingSerializer->normalizeFilter($filter);

        if (empty($filters)) {
            return '';
        }

        $chunks = [];

        foreach ($filters as $key => $value) {
            $chunks[$key] = sprintf('%s eq %s', $key, $value);
        }

        ksort($chunks); // Sorting is not essential, but it makes the result more predictable for unit testing etc

        $str = join(' and ', $chunks);

        return $str;
    }


    /**
     * Gets the pagination data
     *
     * @param PaginationData $paginationData
     * @param ValidatingSerializer $validatingSerializer
     */
    static private function getPaginationData(
        PaginationData $paginationData,
        ValidatingSerializer $validatingSerializer
    ): array
    {
        return $validatingSerializer->normalizePagination($paginationData);
    }


    /**
     * Builds the actual URI
     *
     * @param string $format                Formatted `vsprintf` (printf) compatiable string
     * @param array $args                   Substiutions args passed to `vsprintf`
     * @param AbstractFilter|null $filter
     * @param PaginationData|null $paginationData
     */
    static public function build(
        string $format,
        array $args = [],
        ?AbstractFilter $filter = null,
        ?PaginationData $paginationData = null
    ): string
    {
        $validatingSerializer = (new \Rentpost\ForteApi\ValidatingSerializer\Factory())->make();

        $uri = Formatter::format($format, $args);

        if (substr($uri, 0, 1) === '/') {
            // The leading `/` seem to imply absoulte value to guzzle, but we want guzzle to append this to the base uri
            throw new LibraryFaultException('The first character of the uri is `/` but it should be omitted');
        }

        $queryData = []; // Used to construct "URL Query string" in the format ?var=value&foo=bar

        if ($paginationData) {
            $queryData = self::getPaginationData($paginationData, $validatingSerializer);
        }

        if ($filter) {
            $filterString = self::getFilterString($filter, $validatingSerializer);
            if ($filterString) {
                $queryData['filter'] = $filterString;
            }
        }

        ksort($queryData); // Sorting is not essential, but it makes the result more predictable for unit testing etc

        if ($queryData) {
            $uri .= '/?' . http_build_query($queryData);

        }

        return $uri;
    }
}
