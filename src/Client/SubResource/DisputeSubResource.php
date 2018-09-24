<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Filter\DisputeFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

class DisputeSubResource extends AbstractSubResource
{

    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\DisputeId $disputeId
    )
    {
        $uri = UriBuilder::build(
            'organizations/%s/disputes/%s',
            [
                $organizationId->getValue(),
                $disputeId->getValue(),
            ]
        );

        return  $this->getHttpClient()->makeModelRequest('get', $uri, Model\Dispute::class);
    }

    public function find(
        Attribute\Id\OrganizationId $organizationId,
        ?DisputeFilter $filter = null,
        ?PaginationData $pagination = null
    ): Model\DisputeCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/disputes/',
            [
                $organizationId->getValue(),
            ],
            $filter,
            $pagination
        );

        return  $this->getHttpClient()->makeModelRequest('get', $uri, Model\DisputeCollection::class);
    }

}
