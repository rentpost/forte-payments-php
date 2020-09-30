<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ApplicantOrganization Model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class ApplicantOrganization extends AbstractModel
{

    /**
     * @Assert\NotBlank()
     */
    protected string $legalName;

    /**
     * @Assert\NotBlank()
     */
    protected Attribute\TaxIdNumber $taxIdNumber;

    /**
     * @Assert\NotBlank()
     * @Assert\Choice({"c_corporation", "government", "limited_liability_corporation", "partnership_general_or_limited", "publicly_held_corporation", "s_corporation", "sole_proprietorship", "tax_exempt_or_non_profit_organization"})
     */
    protected string $legalStructure;

    /**
     * @Assert\NotBlank()
     */
    protected string $dbaName;

    /**
     * @Assert\NotBlank()
     */
    protected string $streetAddress1;

    /**
     * @Assert\NotBlank()
     */
    protected string $locality;

    /**
     * @Assert\NotBlank()
     */
    protected string $region;

    protected Attribute\PostalCode $postalCode;

    /**
     * Not documented, defauling to "USA" for BC reasons. Use "CAN" for Canada
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="3")
     */
    protected string $country = 'USA';

    protected Attribute\CustomerServicePhone $customerServicePhone;

    /**
     * @Assert\NotBlank()
     */
    protected string $website;

    /**
     * @Assert\NotBlank()
     * https://www.forte.net/devdocs/reference/forte's_business_classification_code.htm
     */
    protected string $businessType;

    /**
     * @Assert\NotBlank()
     */
    protected Attribute\BankRoutingNumber $bankRoutingNumber;

    /**
     * @Assert\NotBlank()
     */
    protected Attribute\BankAccountNumber $bankAccountNumber;

    /**
     * @Assert\Choice({"checking", "savings"})
     */
    protected string $bankAccountType;

    protected ?Attribute\Id\OrganizationId $organizationId = null;


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


    public function getCountry(): string
    {
        return $this->country;
    }


    public function setCountry(string $country): self
    {
        $this->country = $country;

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


    public function getOrganizationId(): ?Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }
}
