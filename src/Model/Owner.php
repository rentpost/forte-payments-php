<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Date;
use Rentpost\ForteApi\Attribute\Phone;
use Rentpost\ForteApi\Attribute\PostalCode;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Owner
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Owner extends AbstractModel
{

    #[Assert\NotBlank]
    protected float $percentage;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['ceo', 'cfo', 'coo', 'managing_member', 'general_partner', 'president', 'vice_president', 'treasurer', 'other'])]
    protected string $title;

    #[Assert\NotBlank]
    protected string $firstName;

    #[Assert\NotBlank]
    protected string $lastName;

    #[Assert\NotBlank]
    protected string $streetAddress1;

    #[Assert\NotBlank]
    protected string $locality;

    /**
     * Two character state abbreviation. It seems Forte also accepts the
     * full state name, however the spelling must be an exact match hence
     * the client library is forcing the two character state abbreviation.
     */
    #[Assert\Length(min: 2, max: 2)]
    #[Assert\NotBlank]
    protected string $region;

    protected PostalCode $postalCode;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 3)]
    protected string $country;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 3)]
    protected string $citizenship;

    #[Assert\NotBlank]
    #[Assert\Email]
    protected string $emailAddress;

    protected Phone $mobilePhone;

    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 4)]
    protected string $last4Ssn;

    protected Date $dateOfBirth;


    public function getPercentage(): float
    {
        return $this->percentage;
    }


    public function setPercentage(float $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title): self
    {
        $this->title = $title;

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


    public function getMobilePhone(): Phone
    {
        return $this->mobilePhone;
    }


    public function setMobilePhone(Phone $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }


    public function getLast4Ssn(): string
    {
        return $this->last4Ssn;
    }


    public function setLast4Ssn(string $last4Ssn): self
    {
        $this->last4Ssn = $last4Ssn;

        return $this;
    }


    public function getDateOfBirth(): Date
    {
        return $this->dateOfBirth;
    }


    public function setDateOfBirth(Date $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
}
