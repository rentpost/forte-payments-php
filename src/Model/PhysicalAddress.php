<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\PostalCode;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PhysicalAddress Model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class PhysicalAddress extends AbstractModel
{

    #[Assert\NotBlank]
    #[Assert\Length(max: 35)]
    protected string $streetLine1;

    #[Assert\Length(max: 35)]
    protected ?string $streetLine2 = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 25)]
    protected string $locality;

    #[Assert\NotBlank]
    #[Assert\Length(max: 10)]
    protected string $region;

    protected PostalCode $postalCode;

    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(exactly: 2)]
    protected ?string $country = null;


    public function getStreetLine1(): string
    {
        return $this->streetLine1;
    }


    public function setStreetLine1(string $streetLine1): self
    {
        $this->streetLine1 = $streetLine1;

        return $this;
    }


    public function getStreetLine2(): ?string
    {
        return $this->streetLine2;
    }


    public function setStreetLine2(?string $streetLine2): self
    {
        $this->streetLine2 = $streetLine2;

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


    public function getCountry(): ?string
    {
        return $this->country;
    }


    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
