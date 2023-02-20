<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Filter\FundingFilter;
use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;

/**
 * FundingSubResource tests
 *
 * @group test-only
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class FundingsTest extends AbstractIntegrationTest
{

    public function testFindAll()
    {
        $client = $this->getForteClient();

        $filter = new FundingFilter;
        $filter->setStartEffectiveDate(new Attribute\Date('2018-01-01'))
            ->setEndEffectiveDate(new Attribute\Date((new \DateTimeImmutable)->format('Y-m-d')));

        $fundingsCollection = $client
            ->useFundings('livetest')
            ->find(UserSettings::getLivetestMerchantOrganizationId(), $filter);

        $this->assertInstanceOf(Model\FundingCollection::class, $fundingsCollection);
        $this->assertInstanceOf(Model\Response::class, $fundingsCollection->getResponse());
    }


    public function testFindAllForEntireOrganization()
    {
        $client = $this->getForteClient();

        $filter = new FundingFilter;
        $filter->setStartEffectiveDate(new Attribute\Date('2018-01-01'))
            ->setEndEffectiveDate(new Attribute\Date((new \DateTimeImmutable)->format('Y-m-d')));

        $fundingsCollection = $client->useFundings('livetest')->findForEntireOrganization($filter);

        $this->assertInstanceOf(Model\FundingCollection::class, $fundingsCollection);
        $this->assertInstanceOf(Model\Response::class, $fundingsCollection->getResponse());
    }
}
