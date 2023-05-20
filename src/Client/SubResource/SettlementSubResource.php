<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Id\TransactionId;
use Rentpost\ForteApi\Filter\SettlementFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

/**
 * SettlementSubResource
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class SettlementSubResource extends AbstractSubResource
{

    /**
     * Find for the organization which is authenticated
     *
     * @param SettlementFilter $filter          Unlike most other find() methods, this one requires filter
     */
    public function findForEntireOrganization(
        SettlementFilter $filter,
        ?PaginationData $pagination = null
    ): Model\SettlementCollection
    {
        $uri = UriBuilder::build('settlements/', [], $filter, $pagination);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\SettlementCollection::class);
    }


    /**
     * Find for the organization which is authenticated
     *
     * @param SettlementFilter $filter          Unlike most other find() methods, this one requires filter
     */
    public function findForTransactionId(
        OrganizationId $organizationId,
        LocationId $locationId,
        TransactionId $transactionId,
    ): Model\SettlementCollection
    {
        $uri = UriBuilder::build("organizations/%s/locations/%s/transactions/%s/settlements/", [
            $organizationId->getValue(),
            $locationId->getValue(),
            $transactionId->getValue()
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\SettlementCollection::class);
    }
}
