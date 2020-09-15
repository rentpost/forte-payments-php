<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Filter\DisputeFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

/**
 * DisputeSubResource
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class DisputeSubResource extends AbstractSubResource
{

    /**
     * Finds a dispute
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\DisputeId $disputeId
    ): ?Model\Dispute
    {
        $uri = UriBuilder::build('organizations/%s/disputes/%s', [
            $organizationId->getValue(),
            $disputeId->getValue(),
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\Dispute::class);
    }


    /**
     * Finds a collection of disputes
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function find(
        Attribute\Id\OrganizationId $organizationId,
        ?DisputeFilter $filter = null,
        ?PaginationData $pagination = null
    ): Model\DisputeCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/disputes/',
            [$organizationId->getValue()],
            $filter,
            $pagination,
        );

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\DisputeCollection::class);
    }
}
