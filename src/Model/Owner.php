<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;

/**
 * Owner
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Owner extends AbstractModel
{

    /**
     * @var float
     * @Assert\NotBlank()
     */
    protected $percentage;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $lastName;

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
     * Two character state abbreviation. It seems Forte also accepts the
     * full state name, however the spelling must be an exact match hence
     * the client library is forcing the two character state abbreviation.
     *
     * @var string
     * @Assert\Length(min=2, max=2)
     * @Assert\NotBlank()
     */
    protected $region;

    /**
     * @var Attribute\PostalCode
     * @Assert\NotBlank()
     */
    protected $postalCode;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=3)
     */
    protected $country;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=3)
     */
    protected $citizenship;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $emailAddress;

    /**
     * @var Attribute\Phone
     * @Assert\NotBlank()
     */
    protected $mobilePhone;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=4, max=4)
     */
    protected $last4Ssn;

    /**
     * @var Attribute\Date
     * @Assert\NotBlank()
     */
    protected $dateOfBirth;


    public function getPercentage(): float
    {
        return $this->percentage;
    }


    public function setPercentage(float $value): self
    {
        $this->percentage = $value;

        return $this;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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


    public function setCountry(string $value): self
    {
        $this->country = $value;

        return $this;
    }


    public function getCitizenship(): string
    {
        return $this->citizenship;
    }


    public function setCitizenship(string $value): self
    {
        $this->citizenship = $value;

        return $this;
    }


    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }


    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }


    public function getMobilePhone(): ?Attribute\Phone
    {
        return $this->mobilePhone;
    }


    public function setMobilePhone(Attribute\Phone $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }


    public function getLast4Ssn()
    {
        return $this->last4Ssn;
    }


    public function setLast4Ssn($last4Ssn): self
    {
        $this->last4Ssn = $last4Ssn;

        return $this;
    }


    public function getDateOfBirth(): Attribute\Date
    {
        return $this->dateOfBirth;
    }


    public function setDateOfBirth(Attribute\Date $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
}
