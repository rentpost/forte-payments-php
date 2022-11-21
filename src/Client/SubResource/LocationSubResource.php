<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Client\SubResource;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Filter\LocationFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Model\Location;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\UriBuilder\UriBuilder;

/**
 * LocationSubResource
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class LocationSubResource extends AbstractSubResource
{

    /**
     * Finds a location
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     */
    public function findOne(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId
    ): ?Model\Location
    {
        $uri = UriBuilder::build('organizations/%s/locations/%s', [
            $organizationId->getValue(),
            $locationId->getValue(),
        ]);

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\Location::class);
    }


    /**
     * Finds a collection of locations
     *
     * @param Attribute\Id\OrganizationId $organizationId       Use reseller org id if reseller
     * @param LocationFilter|null $filter                       Filter required for this method
     */
    public function find(
        Attribute\Id\OrganizationId $organizationId,
        ?LocationFilter $filter = null,
        ?PaginationData $pagination = null
    ): Model\LocationCollection
    {
        $uri = UriBuilder::build(
            'organizations/%s/locations',
            [$organizationId->getValue()],
            $filter,
            $pagination,
        );

        return $this->getHttpClient()->makeModelRequest('get', $uri, Model\LocationCollection::class);
    }


    /**
     * @param Attribute\Id\OrganizationId $organizationId   Use reseller org id if reseller
     */
    public function updateLimits(
        Attribute\Id\OrganizationId $organizationId,
        Attribute\Id\LocationId $locationId,
        Model\EcheckSetting $echeckSetting,
        Model\CardSetting $cardSetting
    ): Model\Location
    {
        /**
         * Need to create a new instance of EcheckSetting and cardSetting objects for the following reasons
         * - we dont want to modify the object passed in
         * - forte is only expecting a few parameters, passing in all of them makes it complain.
         */
        $echeckSettingCopy = new Model\EcheckSetting;
        $echeckSettingCopy->setDailyDebit($echeckSetting->getDailyDebit())
            ->setDailyCredit($echeckSetting->getDailyCredit())
            ->setMonthlyDebit($echeckSetting->getMonthlyDebit())
            ->setMonthlyCredit($echeckSetting->getMonthlyCredit())
            ->setPerTransDebit($echeckSetting->getPerTransDebit())
            ->setPerTransCredit($echeckSetting->getPerTransCredit());

        $cardSettingCopy = new Model\CardSetting;
        $cardSettingCopy->setDailyDebit($cardSetting->getDailyDebit())
            ->setDailyCredit($cardSetting->getDailyCredit())
            ->setMonthlyDebit($cardSetting->getMonthlyDebit())
            ->setMonthlyCredit($cardSetting->getMonthlyCredit())
            ->setPerTransDebit($cardSetting->getPerTransDebit())
            ->setPerTransCredit($cardSetting->getPerTransCredit());

        $service = new Model\Service;
        $service->setEcheck($echeckSettingCopy)
            ->setCard($cardSettingCopy);

        $location = new Location;
        $location->setOrganizationId($organizationId)
            ->setLocationId($locationId)
            ->setServices($service);

        $uri = UriBuilder::build('organizations/%s/locations/%s', [
            $organizationId->getValue(),
            $locationId->getValue(),
        ]);

        return $this->getHttpClient()
            ->makeModelRequest('put', $uri, Model\Location::class, $location);
    }
}
