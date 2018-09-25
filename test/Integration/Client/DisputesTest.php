<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;

class DisputesTest extends AbstractIntegrationTest
{
    public function testFindListNoFilter()
    {
        $client = $this->getForteClient();

        $organizationId = new Attribute\Id\OrganizationId(UserSettings::getLivetestAuthenticatingOrganizationId()); // WONTFIX hard coded

        $disputeCollection = $client->useDisputes()->find($organizationId);

        $this->assertInstanceOf(Model\DisputeCollection::class, $disputeCollection);
        $this->assertInstanceOf(Model\Response::class, $disputeCollection->getResponse());
    }
}
