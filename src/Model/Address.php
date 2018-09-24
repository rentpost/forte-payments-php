<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Model as Model;
use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Note: when making request, such as creating transaction request,
 * you should pass either the addressToken, or you can pass an address
 * on the fly using hte physical_address attribute. This is not clearly documented
 * in the forte documentation however forte tech support confirmed this.
 * WONTFIX Consider making validation rules inside this class to suit this scenario if possible.
 */
class Address extends AbstractModel
{
    /**
     * @var Attribute\Id\AddressToken
     */
    protected $addressToken;

    /**
     * @var Attribute\Id\CustomerToken
     */
    protected $customerToken;

    /**
     * @var Attribute\Id\OrganizationId
     */
    protected $organizationId;

    /**
     * @var Attribute\Id\LocationId
     */
    protected $locationId;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    protected $firstName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    protected $lastName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    protected $companyName;

    /**
     * @var Attribute\Phone
     */
    protected $phone;

    /**
     * @var string
     * @Assert\Email()
     * @Assert\Length(max=50)
     */
    protected $email;

    /**
     * @var string
     * @Assert\Length(max=50)
     */
    protected $label;

    /**
     * @var string
     * @Assert\Choice({"default_billing", "none", "both"})
     */
    protected $addressType;

    /**
     * @var string
     * @Assert\Choice({"residential", "commercial"})
     */
    protected $shippingAddressType;

    /**
     * @var Model\PhysicalAddress
     */
    protected $physicalAddress;


    /**
     * @return Attribute\Id\AddressToken
     */
    public function getAddressToken(): ?Attribute\Id\AddressToken
    {
        return $this->addressToken;
    }


    /**
     * @param Attribute\Id\AddressToken $addressToken
     *
     * @return self
     */
    public function setAddressToken(Attribute\Id\AddressToken $addressToken): self
    {
        $this->addressToken = $addressToken;

        return $this;
    }


    /**
     * @return Attribute\Id\CustomerToken
     */
    public function getCustomerToken(): ?Attribute\Id\CustomerToken
    {
        return $this->customerToken;
    }


    /**
     * @param Attribute\Id\CustomerToken $customerToken
     *
     * @return self
     */
    public function setCustomerToken(Attribute\Id\CustomerToken $customerToken): self
    {
        $this->customerToken = $customerToken;

        return $this;
    }


    /**
     * @return Attribute\Id\OrganizationId
     */
    public function getOrganizationId(): ?Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
     * @param  Attribute\Id\OrganizationId $organizationId
     *
     * @return self
     */
    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    /**
     * @return Attribute\Id\LocationId
     */
    public function getLocationId(): ?Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    /**
     * @param Attribute\Id\LocationId $locationId
     *
     * @return self
     */
    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }


    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }


    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }


    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * @return string
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }


    /**
     * @param string $companyName
     *
     * @return self
     */
    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }


    /**
     * @return Attribute\Phone
     */
    public function getPhone(): ?Attribute\Phone
    {
        return $this->phone;
    }


    /**
     * @param Attribute\Phone $phone
     *
     * @return self
     */
    public function setPhone(Attribute\Phone $phone): self
    {
        $this->phone = $phone;

        return $this;
    }


    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }


    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }


    /**
     * @param string $label
     *
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }


    /**
     * @return string
     */
    public function getAddressType(): ?string
    {
        return $this->addressType;
    }


    /**
     * @param string $addressType
     *
     * @return self
     */
    public function setAddressType(string $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }


    /**
     * @return string
     */
    public function getShippingAddressType(): ?string
    {
        return $this->shippingAddressType;
    }


    /**
     * @param string $shippingAddressType
     *
     * @return self
     */
    public function setShippingAddressType(string $shippingAddressType): self
    {
        $this->shippingAddressType = $shippingAddressType;

        return $this;
    }


    /**
     * @return Model\PhysicalAddress
     */
    public function getPhysicalAddress(): ?Model\PhysicalAddress
    {
        return $this->physicalAddress;
    }


    /**
     * @param mixed $physicalAddress
     *
     * @return self
     */
    public function setPhysicalAddress(Model\PhysicalAddress $physicalAddress): self
    {
        $this->physicalAddress = $physicalAddress;

        return $this;
    }


}
