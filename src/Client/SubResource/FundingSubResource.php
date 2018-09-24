<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Filter\FundingFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

class FundingSubResource extends AbstractSubResource
{

    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\FundingId $fundingId
    )
    {
        $uri = UriBuilder::build(
            'organizations/%s/fundings/%s',
            [
                $organizationId->getValue(),
                $fundingId->getValue(),
            ]
        );

        return  $this->getHttpClient()->makeModelRequest('get', $uri, Model\Funding::class);
    }

    public function find(
        Attribute\Id\OrganizationId $organizationId,
        FundingFilter $filter, // Filter required for this method
        ?PaginationData $pagination = null
    ): Model\FundingCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/fundings',
            [
                $organizationId->getValue(),
            ],
            $filter,
            $pagination
        );

        return  $this->getHttpClient()->makeModelRequest('get', $uri, Model\FundingCollection::class);
    }

}
