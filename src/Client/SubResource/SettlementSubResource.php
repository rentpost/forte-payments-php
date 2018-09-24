<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Filter\SettlementFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

class SettlementSubResource extends AbstractSubResource
{

    /**
     * find for the organization which is authenticated
     */
    public function findForEntireOrganization(
        SettlementFilter $filter, // Unlike most other find() methods, this one requires filter.
        ?PaginationData $pagination = null
    ): Model\SettlementCollection
    {
        $uri = UriBuilder::build(
            'settlements/',
            [],
            $filter,
            $pagination
        );

        return  $this->getHttpClient()->makeModelRequest(
            'get',
            $uri,
            Model\SettlementCollection::class
        );
    }
}
