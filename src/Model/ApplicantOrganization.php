<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

class ApplicantOrganization extends AbstractModel
{

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $legalName;

    /**
     * @var Attribute\TaxIdNumber
     * @Assert\NotBlank()
     */
    protected $taxIdNumber;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"c_corporation", "government", "limited_liability_corporation", "other", "partnership_general_or_limited", "publicly_held_corporation", "s_corporation", "sole_proprietorship", "tax_exempt_or_non_profit_organization"})
     */
    protected $legalStructure;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $dbaName;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $streetAddress1;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $locality;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $region;

    /**
     * @var Attribute\PostalCode
     * @Assert\NotBlank()
     */
    protected $postalCode;

    /**
     * @var Attribute\CustomerServicePhone
     * @Assert\NotBlank()
     */
    protected $customerServicePhone;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $website;

    /**
     * @var string
     * @Assert\NotBlank()
     * https://www.forte.net/devdocs/reference/forte's_business_classification_code.htm
     */
    protected $businessType;

    /**
     * @var Attribute\BankRoutingNumber
     * @Assert\NotBlank()
     */
    protected $bankRoutingNumber;

    /**
     * @var Attribute\BankAccountNumber
     * @Assert\NotBlank()
     */
    protected $bankAccountNumber;

    /**
     * @var string
     * @Assert\Choice({"checking", "savings"})
     */
    protected $bankAccountType;

    /**
     * @var Attribute\Id\OrganizationId
     */
    protected $organizationId;


    public function getLegalName(): string
    {
        return $this->legalName;
    }


    public function setLegalName(string $legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }


    public function getTaxIdNumber(): Attribute\TaxIdNumber
    {
        return $this->taxIdNumber;
    }


    public function setTaxIdNumber(Attribute\TaxIdNumber $taxIdNumber): self
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


    public function getPostalCode(): Attribute\PostalCode
    {
        return $this->postalCode;
    }


    public function setPostalCode(Attribute\PostalCode $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }


    public function getCustomerServicePhone(): Attribute\CustomerServicePhone
    {
        return $this->customerServicePhone;
    }


    public function setCustomerServicePhone(Attribute\CustomerServicePhone $customerServicePhone): self
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


    public function getBankRoutingNumber(): Attribute\BankRoutingNumber
    {
        return $this->bankRoutingNumber;
    }


    public function setBankRoutingNumber(Attribute\BankRoutingNumber $bankRoutingNumber): self
    {
        $this->bankRoutingNumber = $bankRoutingNumber;

        return $this;
    }


    public function getBankAccountNumber(): Attribute\BankAccountNumber
    {
        return $this->bankAccountNumber;
    }


    public function setBankAccountNumber(Attribute\BankAccountNumber $bankAccountNumber): self
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


    public function getOrganizationId(): ?Attribute\OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(Attribute\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


}
