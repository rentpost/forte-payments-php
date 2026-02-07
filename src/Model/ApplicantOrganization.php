<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\BankAccountNumber;
use Rentpost\ForteApi\Attribute\BankRoutingNumber;
use Rentpost\ForteApi\Attribute\CustomerServicePhone;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\PostalCode;
use Rentpost\ForteApi\Attribute\TaxIdNumber;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ApplicantOrganization Model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class ApplicantOrganization extends AbstractModel
{

    #[Assert\NotBlank]
    protected string $legalName;

    #[Assert\NotBlank]
    protected TaxIdNumber $taxIdNumber;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['c_corporation', 'government', 'limited_liability_corporation', 'partnership_general_or_limited', 'publicly_held_corporation', 's_corporation', 'sole_proprietorship', 'tax_exempt_or_non_profit_organization'])]
    protected string $legalStructure;

    #[Assert\NotBlank]
    protected string $dbaName;

    #[Assert\NotBlank]
    protected string $streetAddress1;

    #[Assert\NotBlank]
    protected string $locality;

    #[Assert\NotBlank]
    protected string $region;

    protected PostalCode $postalCode;

    /**
     * Not documented, defauling to "USA" for BC reasons. Use "CAN" for Canada
     */
    #[Assert\NotBlank]
    #[Assert\Length(max: 3)]
    protected string $country = 'USA';

    protected CustomerServicePhone $customerServicePhone;

    #[Assert\NotBlank]
    protected string $website;

    #[Assert\NotBlank]
    protected string $businessType;

    #[Assert\NotBlank]
    protected BankRoutingNumber $bankRoutingNumber;

    #[Assert\NotBlank]
    protected BankAccountNumber $bankAccountNumber;

    #[Assert\Choice(choices: ['checking', 'savings'])]
    protected string $bankAccountType;

    protected ?OrganizationId $organizationId = null;


    public function getLegalName(): string
    {
        return $this->legalName;
    }


    public function setLegalName(string $legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }


    public function getTaxIdNumber(): TaxIdNumber
    {
        return $this->taxIdNumber;
    }


    public function setTaxIdNumber(TaxIdNumber $taxIdNumber): self
    {
        $this->taxIdNumber = $taxIdNumber;

        return $this;
    }


    public function getLegalStructure(): string
    {
        return $this->legalStructure;
    }


    public function setLegalStructure(string $legalStructure): self
    {
        $this->legalStructure = $legalStructure;

        return $this;
    }


    public function getDbaName(): string
    {
        return $this->dbaName;
    }


    public function setDbaName(string $dbaName): self
    {
        $this->dbaName = $dbaName;

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


    public function getPostalCode(): PostalCode
    {
        return $this->postalCode;
    }


    public function setPostalCode(PostalCode $postalCode): self
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


    public function getCustomerServicePhone(): CustomerServicePhone
    {
        return $this->customerServicePhone;
    }


    public function setCustomerServicePhone(CustomerServicePhone $customerServicePhone): self
    {
        $this->customerServicePhone = $customerServicePhone;

        return $this;
    }


    public function getWebsite(): string
    {
        return $this->website;
    }


    public function setWebsite(string $website): self
    {
        $this->website = $website;

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


    public function getBankRoutingNumber(): BankRoutingNumber
    {
        return $this->bankRoutingNumber;
    }


    public function setBankRoutingNumber(BankRoutingNumber $bankRoutingNumber): self
    {
        $this->bankRoutingNumber = $bankRoutingNumber;

        return $this;
    }


    public function getBankAccountNumber(): BankAccountNumber
    {
        return $this->bankAccountNumber;
    }


    public function setBankAccountNumber(BankAccountNumber $bankAccountNumber): self
    {
        $this->bankAccountNumber = $bankAccountNumber;

        return $this;
    }


    public function getBankAccountType(): string
    {
        return $this->bankAccountType;
    }


    public function setBankAccountType(string $bankAccountType): self
    {
        $this->bankAccountType = $bankAccountType;

        return $this;
    }


    public function getOrganizationId(): ?OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(?OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }
}
