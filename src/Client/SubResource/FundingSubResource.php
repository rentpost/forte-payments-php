<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Filter\FundingFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;


/**
 * FundingSubResource
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class FundingSubResource extends AbstractSubResource
{

    /**
     * Finds a funding
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\FundingId $fundingId
    ): ?Model\Funding
    {
        $uri = UriBuilder::build('organizations/%s/fundings/%s', [
            $organizationId->getValue(),
            $fundingId->getValue(),
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\Funding::class);
    }


    /**
     * Finds a collection of fundings
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     * @param FundingFilter $filter                             Filter required for this method
     */
    public function find(
        Attribute\Id\OrganizationId $organizationId,
        FundingFilter $filter,
        ?PaginationData $pagination = null
    ): Model\FundingCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/fundings',
            [$organizationId->getValue()],
            $filter,
            $pagination,
        );

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\FundingCollection::class);
    }
}
