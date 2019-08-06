<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Location model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Location extends AbstractModel
{

    /**
     * @var Attribute\Id\OrganizationId|null
     */
    protected $parentOrganizationId;

    /**
     * @var Attribute\Id\OrganizationId
     * @Assert\NotBlank()
     */
    protected $organizationId;

    /**
     * @var Attribute\Id\LocationId
     * @Assert\NotBlank()
     */
    protected $locationId;

    /**
     * @var string|null
     * @Assert\Choice({"live", "pending", "closing", "on-hold", "deleted"})
     */
    protected $status;

    /**
     * Read only
     * @var Attribute\DateTime|null
     */
    protected $createdDate;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $dbaName;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $streetAddress1;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $streetAddress2;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $locality;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $region;

    /**
     * @var string|null
     * @Assert\Length(max=255)
     */
    protected $postalCode;

    /**
     * @var string|null
     * @Assert\Length(max=3)
     */
    protected $country;

    /**
     * @var string|null
     * @Assert\Length(max=15)
     */
    protected $businessPhone;

    /**
     * @var string|null
     * @Assert\Length(max=3)
     */
    protected $currency;

    /**
     * @var string|null
     * @Assert\Length(max=2)
     * @Assert\Choice({"PT", "MT", "CT", "ET"})
     */
    protected $timezone;

    /**
     * @var string|null
     * @Assert\Length(max=20)
     */
    protected $businessType;

    /**
     * @var string|null
     * @Assert\Length(max=50)
     */
    protected $organizationName;

    /**
     * @var Model\Contact|null
     * @Assert\Valid
     */
    protected $contacts;

    /**
     * @var Model\Service
     * @Assert\NotBlank()
     * @Assert\Valid
     */
    protected $services;

    /**
     * @var string|null
     */
    protected $bankaccountCreditsToken;

    /**
     * @var string|null
     */
    protected $bankaccountDebitsToken;

    /**
     * @var string|null
     */
    protected $bankaccountBillingToken;

    /**
     * @var string|null
     */
    protected $bankaccountCcfeeToken;

    /**
     * @var string|null
     */
    protected $bankaccountEcfeeToken;


    /**
     * Get the value of parentOrganizationId
     */
    public function getParentOrganizationId(): ?Attribute\Id\OrganizationId
    {
        return $this->parentOrganizationId;
    }


    /**
     * Set the value of parentOrganizationId
     *
     * @param Attribute\Id\OrganizationId|null $parentOrganizationId
     */
    public function setParentOrganizationId(?Attribute\Id\OrganizationId $parentOrganizationId): self
    {
        $this->parentOrganizationId = $parentOrganizationId;

        return $this;
    }


    /**
     * Get the value of organizationId
     */
    public function getOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
     * Set the value of organizationId
     *
     * @param Attribute\Id\OrganizationId $organizationId
     */
    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    /**
     * Get the value of locationId
     */
    public function getLocationId(): Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    /**
     * Set the value of locationId
     *
     * @param Attribute\Id\LocationId $locationId
     */
    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    /**
     * Get the value of status
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }


    /**
     * Set the value of status
     *
     * @param string|null $status
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }


    /**
     * Get read only
     */
    public function getCreatedDate(): ?Attribute\DateTime
    {
        return $this->createdDate;
    }


    /**
     * Set read only
     *
     * @param Attribute\DateTime|null $createdDate Read only
     */
    public function setCreatedDate(?Attribute\DateTime $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }


    /**
     * Get the value of dbaName
     */
    public function getDbaName(): ?string
    {
        return $this->dbaName;
    }


    /**
     * Set the value of dbaName
     *
     * @param string|null $dbaName
     */
    public function setDbaName(?string $dbaName): self
    {
        $this->dbaName = $dbaName;

        return $this;
    }


    /**
     * Get the value of streetAddress1
     */
    public function getStreetAddress1(): ?string
    {
        return $this->streetAddress1;
    }


    /**
     * Set the value of streetAddress1
     *
     * @param string|null $streetAddress1
     */
    public function setStreetAddress1(?string $streetAddress1): self
    {
        $this->streetAddress1 = $streetAddress1;

        return $this;
    }


    /**
     * Get the value of streetAddress2
     */
    public function getStreetAddress2(): ?string
    {
        return $this->streetAddress2;
    }


    /**
     * Set the value of streetAddress2
     *
     * @param string|null $streetAddress2
     */
    public function setStreetAddress2(?string $streetAddress2): self
    {
        $this->streetAddress2 = $streetAddress2;

        return $this;
    }


    /**
     * Get the value of locality
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }


    /**
     * Set the value of locality
     *
     * @param string|null $locality
     */
    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }


    /**
     * Get the value of region
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }


    /**
     * Set the value of region
     *
     * @param string|null $region
     */
    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }


    /**
     * Get the value of postalCode
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }


    /**
     * Set the value of postalCode
     *
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }


    /**
     * Get the value of country
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }


    /**
     * Set the value of country
     *
     * @param string|null $country
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }


    /**
     * Get the value of businessPhone
     */
    public function getBusinessPhone(): ?string
    {
        return $this->businessPhone;
    }


    /**
     * Set the value of businessPhone
     *
     * @param string|null $businessPhone
     */
    public function setBusinessPhone(?string $businessPhone): self
    {
        $this->businessPhone = $businessPhone;

        return $this;
    }


    /**
     * Get the value of currency
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }


    /**
     * Set the value of currency
     *
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


    /**
     * Get the value of timezone
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }


    /**
     * Set the value of timezone
     *
     * @param string|null $timezone
     */
    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }


    /**
     * Get the value of businessType
     */
    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }


    /**
     * Set the value of businessType
     *
     * @param string|null $businessType
     */
    public function setBusinessType(?string $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }


    /**
     * Get the value of organizationName
     */
    public function getOrganizationName(): ?string
    {
        return $this->organizationName;
    }


    /**
     * Set the value of organizationName
     *
     * @param string|null $organizationName
     */
    public function setOrganizationName(?string $organizationName): self
    {
        $this->organizationName = $organizationName;

        return $this;
    }


    /**
     * Get the value of contacts
     */
    public function getContacts(): ?Model\Contact
    {
        return $this->contacts;
    }


    /**
     * Set the value of contacts
     *
     * @param Model\Contact|null $contacts
     */
    public function setContacts(?Model\Contact $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }


    /**
     * Get the value of services
     */
    public function getServices(): Model\Service
    {
        return $this->services;
    }


    /**
     * Set the value of services
     *
     * @param Model\Service $services
     */
    public function setServices(Model\Service $services): self
    {
        $this->services = $services;

        return $this;
    }


    /**
     * Get the value of bankaccountCreditsToken
     */
    public function getBankaccountCreditsToken(): ?string
    {
        return $this->bankaccountCreditsToken;
    }


    /**
     * Set the value of bankaccountCreditsToken
     *
     * @param string|null $bankaccountCreditsToken
     */
    public function setBankaccountCreditsToken(?string $bankaccountCreditsToken): self
    {
        $this->bankaccountCreditsToken = $bankaccountCreditsToken;

        return $this;
    }


    /**
     * Get the value of bankaccountDebitsToken
     */
    public function getBankaccountDebitsToken(): ?string
    {
        return $this->bankaccountDebitsToken;
    }


    /**
     * Set the value of bankaccountDebitsToken
     *
     * @param string|null $bankaccountDebitsToken
     */
    public function setBankaccountDebitsToken(?string $bankaccountDebitsToken): self
    {
        $this->bankaccountDebitsToken = $bankaccountDebitsToken;

        return $this;
    }


    /**
     * Get the value of bankaccountBillingToken
     */
    public function getBankaccountBillingToken(): ?string
    {
        return $this->bankaccountBillingToken;
    }


    /**
     * Set the value of bankaccountBillingToken
     *
     * @param string|null $bankaccountBillingToken
     */
    public function setBankaccountBillingToken(?string $bankaccountBillingToken): self
    {
        $this->bankaccountBillingToken = $bankaccountBillingToken;

        return $this;
    }


    /**
     * Get the value of bankaccountCcfeeToken
     */
    public function getBankaccountCcfeeToken(): ?string
    {
        return $this->bankaccountCcfeeToken;
    }


    /**
     * Set the value of bankaccountCcfeeToken
     *
     * @param string|null $bankaccountCcfeeToken
     */
    public function setBankaccountCcfeeToken(?string $bankaccountCcfeeToken): self
    {
        $this->bankaccountCcfeeToken = $bankaccountCcfeeToken;

        return $this;
    }


    /**
     * Get the value of bankaccountEcfeeToken
     */
    public function getBankaccountEcfeeToken(): ?string
    {
        return $this->bankaccountEcfeeToken;
    }


    /**
     * Set the value of bankaccountEcfeeToken
     *
     * @param string|null $bankaccountEcfeeToken
     */
    public function setBankaccountEcfeeToken(?string $bankaccountEcfeeToken): self
    {
        $this->bankaccountEcfeeToken = $bankaccountEcfeeToken;

        return $this;
    }
}
