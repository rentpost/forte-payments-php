<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Exception\Request\AbstractRequestException;
use Rentpost\ForteApi\Exception\ValidationException;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;
use Rentpost\ForteApi\UriBuilder\PaginationData;
use Rentpost\ForteApi\Filter\TransactionFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Exception\Request\TransactionException;

/**
 * Tests the LocationSubResource
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class LocationsTest extends AbstractIntegrationTest
{

    /**
     * Assert that the response has expected values
     *
     * @param Model\Location $returnedLocation
     */
    protected function assertTransactionModel(Model\Location $returnedLocation): void
    {
        $this->assertInstanceOf(Model\Location::class, $returnedLocation);
        $this->assertInstanceOf(Model\Response::class, $returnedLocation->getResponse());

        $this->assertInstanceOf(Model\Contact::class, $returnedLocation->getContacts());
        $this->assertInstanceOf(Model\Service::class, $returnedLocation->getServices());
        $this->assertInstanceOf(Model\EcheckSetting::class, $returnedLocation->getServices()->getEcheck());
        $this->assertInstanceOf(Model\CardSetting::class, $returnedLocation->getServices()->getCard());

        $this->assertInstanceOf(Attribute\Id\OrganizationId::class, $returnedLocation->getParentOrganizationId());
        $this->assertInstanceOf(Attribute\Id\OrganizationId::class, $returnedLocation->getOrganizationId());
        $this->assertInstanceOf(Attribute\Id\LocationId::class, $returnedLocation->getLocationId());
        $this->assertInstanceOf(Attribute\DateTime::class, $returnedLocation->getCreatedDate());

        $this->assertEquals('live', $returnedLocation->getStatus());
        $this->assertEquals('Rentpost Inc', $returnedLocation->getDbaName());
        $this->assertEquals('USD', $returnedLocation->getCurrency());

        $this->assertEquals(['AMEX', 'DISC', 'MC', 'VISA'], $returnedLocation->getServices()->getCard()->getCardTypes());
    }


    /**
     * Test that we can find our location_id from our settings
     */
    public function testFindOne(): void
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $location = $client->useLocations()->findOne($organizationId, $locationId);

        $this->assertNotEmpty($location, 'Attmpting to find a Location resource');

        $this->assertTransactionModel($location, false);
    }


    /**
     * Testing finding all Locations for an Organization
     */
    public function testFind()
    {
        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();

        $locationCollection = $client->useLocations()->find($organizationId);

        $this->assertInstanceOf(Model\LocationCollection::class, $locationCollection);

        foreach ($locationCollection->getResults() as $location) {
            $this->assertInstanceOf(Model\Location::class, $location);
        }

        // Only one location in the Sandbox
        $this->assertEquals(1, $locationCollection->getNumberResults());
    }


    /**
     * Test updating the limits for a Location
     */
    public function testUpdateLimits(): void
    {
        // Remove this if your API Access ID has access to update service limits
        $this->expectException(TransactionException::class);

        $client = $this->getForteClient();

        $organizationId = UserSettings::getSandboxMerchantOrganizationId();
        $locationId = UserSettings::getSandboxMerchantLocationId();

        $echeckSetting = new Model\EcheckSetting();
        $echeckSetting->setDailyDebit(100000)
            ->setDailyCredit(100000)
            ->setMonthlyDebit(100000)
            ->setMonthlyCredit(100000)
            ->setPerTransDebit(5000)
            ->setPerTransCredit(5000);

        $cardSetting = new Model\CardSetting();
        $cardSetting->setDailyDebit(100000)
            ->setDailyCredit(100000)
            ->setMonthlyDebit(100000)
            ->setMonthlyCredit(100000)
            ->setPerTransDebit(5000)
            ->setPerTransCredit(5000);

        $returnedLocation = $client->useLocations()->updateLimits(
            $organizationId,
            $locationId,
            $echeckSetting,
            $cardSetting,
        );

        $this->assertInstanceOf(Model\Location::class, $returnedLocation);
    }
}
