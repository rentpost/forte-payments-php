<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Phone;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Location model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Location extends AbstractModel
{

    protected ?OrganizationId $parentOrganizationId;
    protected OrganizationId $organizationId;
    protected LocationId $locationId;

    #[Assert\Choice(choices: ['live', 'pending', 'closing', 'on-hold', 'deleted'])]
    protected string $status;

    /**
     * Read only
     */
    protected DateTime $createdDate;

    #[Assert\Length(max: 255)]
    protected string $streetAddress1;

    #[Assert\Length(max: 255)]
    protected ?string $streetAddress2 = null;

    #[Assert\Length(max: 255)]
    protected string $locality;

    #[Assert\Length(max: 255)]
    protected string $region;

    #[Assert\Length(max: 255)]
    protected string $postalCode;

    #[Assert\Length(max: 3)]
    protected string $country;

    protected Phone $businessPhone;

    #[Assert\Length(max: 3)]
    protected string $currency;

    #[Assert\Length(max: 2)]
    #[Assert\Choice(choices: ['PT', 'MT', 'CT', 'ET'])]
    protected string $timezone;

    #[Assert\Length(max: 20)]
    protected string $businessType;

    #[Assert\Length(max: 50)]
    protected string $organizationName;

    #[Assert\Length(max: 255)]
    protected ?string $dbaName = null;

    #[Assert\Valid]
    protected Contact $contacts;

    #[Assert\Valid]
    protected Service $services;

    protected ?string $bankaccountCreditsToken = null;
    protected ?string $bankaccountDebitsToken = null;
    protected ?string $bankaccountBillingToken = null;
    protected ?string $bankaccountCcfeeToken = null;
    protected ?string $bankaccountEcfeeToken = null;


    public function getParentOrganizationId(): ?OrganizationId
    {
        return $this->parentOrganizationId;
    }


    public function setParentOrganizationId(?OrganizationId $parentOrganizationId): self
    {
        $this->parentOrganizationId = $parentOrganizationId;

        return $this;
    }


    public function getOrganizationId(): OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    public function getLocationId(): LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


    public function getCreatedDate(): DateTime
    {
        return $this->createdDate;
    }


    public function setCreatedDate(DateTime $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }


    public function getStreetAddress1(): string
    {
        return $this->streetAddress1;
    }


    public function setStreetAddress1(string $streetAddress1): self
    {
        $this->streetAddress1 = $streetAddress1;

        return $this;
    }


    public function getStreetAddress2(): ?string
    {
        return $this->streetAddress2;
    }


    public function setStreetAddress2(?string $streetAddress2): self
    {
        $this->streetAddress2 = $streetAddress2;

        return $this;
    }


    public function getLocality(): string
    {
        return $this->locality;
    }


    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }


    public function getRegion(): string
    {
        return $this->region;
    }


    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }


    public function getPostalCode(): string
    {
        return $this->postalCode;
    }


    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }


    public function getCountry(): string
    {
        return $this->country;
    }


    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }


    public function getBusinessPhone(): Phone
    {
        return $this->businessPhone;
    }


    public function setBusinessPhone(Phone $businessPhone): self
    {
        $this->businessPhone = $businessPhone;

        return $this;
    }


    public function getCurrency(): string
    {
        return $this->currency;
    }


    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


    public function getTimezone(): string
    {
        return $this->timezone;
    }


    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }


    public function getBusinessType(): string
    {
        return $this->businessType;
    }


    public function setBusinessType(string $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }


    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }


    public function setOrganizationName(string $organizationName): self
    {
        $this->organizationName = $organizationName;

        return $this;
    }


    public function getDbaName(): ?string
    {
        return $this->dbaName;
    }


    public function setDbaName(?string $dbaName): self
    {
        $this->dbaName = $dbaName;

        return $this;
    }


    public function getContacts(): Contact
    {
        return $this->contacts;
    }


    public function setContacts(Contact $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }


    public function getServices(): Service
    {
        return $this->services;
    }


    public function setServices(Service $services): self
    {
        $this->services = $services;

        return $this;
    }


    public function getBankaccountCreditsToken(): ?string
    {
        return $this->bankaccountCreditsToken;
    }


    public function setBankaccountCreditsToken(?string $bankaccountCreditsToken): self
    {
        $this->bankaccountCreditsToken = $bankaccountCreditsToken;

        return $this;
    }


    public function getBankaccountDebitsToken(): ?string
    {
        return $this->bankaccountDebitsToken;
    }


    public function setBankaccountDebitsToken(?string $bankaccountDebitsToken): self
    {
        $this->bankaccountDebitsToken = $bankaccountDebitsToken;

        return $this;
    }


    public function getBankaccountBillingToken(): ?string
    {
        return $this->bankaccountBillingToken;
    }


    public function setBankaccountBillingToken(?string $bankaccountBillingToken): self
    {
        $this->bankaccountBillingToken = $bankaccountBillingToken;

        return $this;
    }


    public function getBankaccountCcfeeToken(): ?string
    {
        return $this->bankaccountCcfeeToken;
    }


    public function setBankaccountCcfeeToken(?string $bankaccountCcfeeToken): self
    {
        $this->bankaccountCcfeeToken = $bankaccountCcfeeToken;

        return $this;
    }


    public function getBankaccountEcfeeToken(): ?string
    {
        return $this->bankaccountEcfeeToken;
    }


    public function setBankaccountEcfeeToken(?string $bankaccountEcfeeToken): self
    {
        $this->bankaccountEcfeeToken = $bankaccountEcfeeToken;

        return $this;
    }
}
