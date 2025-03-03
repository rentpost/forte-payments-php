<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Id\AddressToken;
use Rentpost\ForteApi\Attribute\Id\CustomerToken;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Phone;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Note: when making request, such as creating transaction request,
 * you should pass either the addressToken, or you can pass an address
 * on the fly using hte physical_address attribute. This is not clearly documented
 * in the forte documentation however forte tech support confirmed this.
 * WONTFIX Consider making validation rules inside this class to suit this scenario if possible.
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Address extends AbstractModel
{

    protected AddressToken $addressToken;
    protected CustomerToken $customerToken;
    protected OrganizationId $organizationId;
    protected LocationId $locationId;

    #[Assert\Length(max: 50)]
    protected ?string $firstName = null;

    #[Assert\Length(max: 50)]
    protected ?string $lastName = null;

    #[Assert\Length(max: 50)]
    protected ?string $companyName = null;

    protected ?Phone $phone = null;

    #[Assert\Email]
    #[Assert\Length(max: 50)]
    protected ?string $email = null;

    #[Assert\Length(max: 50)]
    protected ?string $label = null;

    #[Assert\Choice(['default_billing', 'none', 'both'])]
    protected ?string $addressType = null;

    #[Assert\Choice(['residential', 'commercial'])]
    protected string $shippingAddressType;

    #[Assert\Valid]
    protected ?PhysicalAddress $physicalAddress = null;


    public function getAddressToken(): AddressToken
    {
        return $this->addressToken;
    }


    public function setAddressToken(AddressToken $addressToken): self
    {
        $this->addressToken = $addressToken;

        return $this;
    }


    public function getCustomerToken(): CustomerToken
    {
        return $this->customerToken;
    }


    public function setCustomerToken(CustomerToken $customerToken): self
    {
        $this->customerToken = $customerToken;

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


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }


    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getLastName(): ?string
    {
        return $this->lastName;
    }


    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }


    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }


    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }


    public function getPhone(): ?Phone
    {
        return $this->phone;
    }


    public function setPhone(?Phone $phone): self
    {
        $this->phone = $phone;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getLabel(): ?string
    {
        return $this->label;
    }


    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }


    public function getAddressType(): ?string
    {
        return $this->addressType;
    }


    public function setAddressType(?string $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }


    public function getShippingAddressType(): string
    {
        return $this->shippingAddressType;
    }


    public function setShippingAddressType(string $shippingAddressType): self
    {
        $this->shippingAddressType = $shippingAddressType;

        return $this;
    }


    public function getPhysicalAddress(): ?PhysicalAddress
    {
        return $this->physicalAddress;
    }


    public function setPhysicalAddress(?PhysicalAddress $physicalAddress): self
    {
        $this->physicalAddress = $physicalAddress;

        return $this;
    }
}
