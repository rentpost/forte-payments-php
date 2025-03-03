<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
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
    protected ?string $streetLine2;

    #[Assert\NotBlank]
    #[Assert\Length(max: 25)]
    protected string $locality;

    #[Assert\NotBlank]
    #[Assert\Length(max: 10)]
    protected string $region;

    protected Attribute\PostalCode $postalCode;


    /**
     * Gets the street address
     */
    public function getStreetLine1(): string
    {
        return $this->streetLine1;
    }


    /**
     * Sets street address
     */
    public function setStreetLine1(string $streetLine1): self
    {
        $this->streetLine1 = $streetLine1;

        return $this;
    }


    /**
     * Get apt, suite, etc.
     */
    public function getStreetLine2(): ?string
    {
        return $this->streetLine2;
    }


    /**
     * Set apt, suite, etc.
     */
    public function setStreetLine2(?string $streetLine2): self
    {
        $this->streetLine2 = $streetLine2;

        return $this;
    }


    /**
     * Gets the locatlity
     */
    public function getLocality(): string
    {
        return $this->locality;
    }


    /**
     * Sets the locality
     */
    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }


    /**
     * Gets the region
     */
    public function getRegion(): string
    {
        return $this->region;
    }


    /**
     * Sets the region
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }


    /**
     * Gets the postal code
     */
    public function getPostalCode(): Attribute\PostalCode
    {
        return $this->postalCode;
    }


    /**
     * Sets the postal code
     */
    public function setPostalCode(Attribute\PostalCode $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}
