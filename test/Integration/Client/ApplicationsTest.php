<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Test\Integration\Client;

use Rentpost\ForteApi\Model;
use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Test\Integration\AbstractIntegrationTest;
use Rentpost\ForteApi\Test\UserSettings;

class ApplicationsTest extends AbstractIntegrationTest
{

    /**
     * Tests creating an Application
     */
    public function testCreate()
    {
        $riskSessionId = rand().rand().time();
        // $riskUrl = 'https://img3.forte.net/fp/tags.js?org_id=xdzpgyj7&session_id=' . $riskSessionId . '&pageid=1';
        // $tempGuzzle = new GuzzleClient();
        // $tempGuzzle->get($riskUrl);
        // sleep(10); // this is attemping to fake risk session id, might not be working anyway


        $owner1 = new Model\Owner();
        $owner1
            ->setPercentage(70.0)
            ->setTitle('president')
            ->setFirstName('Bill')
            ->setLastName('Gates (test)')
            ->setStreetAddress1('10 Smith Street')
            ->setLocality('Boston')
            ->setRegion('MA')
            ->setPostalCode(new Attribute\PostalCode('12345'))
            ->setCountry('USA')
            ->setCitizenship('USA')
            ->setEmailAddress(UserSettings::getApplicationOwnerEmail())
            ->setMobilePhone(new Attribute\Phone('1234567890'))
            ->setLast4Ssn(1234)
            ->setDateOfBirth(new Attribute\Date('1993-03-22'));

        $owner2 = new Model\Owner();
        $owner2
            ->setPercentage(30.0)
            ->setTitle('other')
            ->setFirstName('Steve')
            ->setLastName('Jobs (test)')
            ->setStreetAddress1('10 Apple Walk')
            ->setLocality('San Francisco')
            ->setRegion('CA')
            ->setPostalCode(new Attribute\PostalCode('12345'))
            ->setCountry('USA')
            ->setCitizenship('USA')
            ->setEmailAddress(UserSettings::getApplicationOwnerEmail())
            ->setMobilePhone(new Attribute\Phone('1234567890'))
            ->setLast4Ssn(1234)
            ->setDateOfBirth(new Attribute\Date('1990-01-25'));

        $applicantOrganization = new Model\ApplicantOrganization;

        $applicantOrganization
            ->setLegalName('Microsoft (test)')
            ->setTaxIdNumber(new Attribute\TaxIdNumber('123456789'))
            ->setLegalStructure('limited_liability_corporation')
            ->setDbaName('Microsoft international business software (test)')
            ->setStreetAddress1('20 Main Street')
            ->setLocality('Boston')
            ->setRegion('Massachusetts')
            ->setPostalCode(new Attribute\PostalCode('54321'))
            ->setCustomerServicePhone(new Attribute\CustomerServicePhone('1234567890'))
            ->setWebsite('www.microsoft.com')
            ->setBusinessType('A11900') // Real Estate Agents and Managers - Rentals
            ->setBankRoutingNumber(new Attribute\BankRoutingNumber('111000258'))
            ->setBankAccountNumber(new Attribute\BankAccountNumber('000000000'))
            ->setBankAccountType('savings');


        $application = new \Rentpost\ForteApi\Model\Application();

        $application
            ->setFeeId(UserSettings::getApplicationFeeId())
            ->setSourceIp(new Attribute\IpAddress('127.0.0.1'))
            ->setAnnualVolume(new Attribute\Money(10000))
            ->setAverageTransactionAmount(new Attribute\Money(5000))
            ->setMaximumTransactionAmount(new Attribute\Money(5000))
            ->setAveragePayableAmount(new Attribute\Money(650))
            ->setMaximumPayableAmount(new Attribute\Money(2200))
            ->setMonthlyPayableVolume(new Attribute\Money(5000))
            ->setMarketType('internet')
            ->setTAndCVersion('14.08.02')
            ->setTAndCTimeStamp(new Attribute\DateTime(new \DateTime()))
            ->setRiskSessionId($riskSessionId)
            ->setApplicantOrganization($applicantOrganization)
            ->setOwner1($owner1)
            ->setOwner2($owner2);

        $client = $this->getForteClient();

        $returnedApplication = $client->useApplications()->create($application);

        $this->assertInstanceOf(Model\Application::class, $returnedApplication);
        $this->assertInstanceOf(Attribute\Id\ApplicationId::class, $returnedApplication->getApplicationId());

        $this->assertEquals('127.0.0.1', $returnedApplication->getSourceIp()->getValue());
        $this->assertEquals('5000.00', $returnedApplication->getMaximumTransactionAmount()->getValue());

        $returnedApplicantOrganization = $returnedApplication->getApplicantOrganization();
        $this->assertInstanceOf(Model\ApplicantOrganization::class ,$returnedApplicantOrganization);
        $this->assertEquals('Microsoft (test)', $returnedApplicantOrganization->getLegalName());
    }


    function testFindAll()
    {
        $client = $this->getForteClient();

        $applications = $client->useApplications()->find();

        $this->assertInstanceOf(Model\ApplicationCollection::class, $applications);

        foreach ($applications as $application) {
            $this->assertInstanceOf(Model\Application::class, $application);
        }
    }
}
