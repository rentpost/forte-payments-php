<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Model as Model;
use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

class PhysicalAddress extends AbstractModel
{
    /**
     * @var string
     * @Assert\Length(max=35)
     */
    protected $streetLine1;

    /**
     * @var string
     * @Assert\Length(max=35)
     */
    protected $streetLine2;

    /**
     * town/village/city
     * @var string
     * @Assert\Length(max=25)
     */
    protected $locality;

    /**
     * state or province
     * @var string
     * @Assert\Length(max=2)
     */
    protected $region;

    /**
     * @var Attribute\PostalCode
     */
    protected $postalCode;


    /**
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->streetLine1;
    }


    /**
     * @param string $streetLine1
     *
     * @return self
     */
    public function setStreetLine1(string $streetLine1): self
    {
        $this->streetLine1 = $streetLine1;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getStreetLine2(): ?string
    {
        return $this->streetLine2;
    }


    /**
     * @param string|null $streetLine2
     *
     * @return self
     */
    public function setStreetLine2(?string $streetLine2): self
    {
        $this->streetLine2 = $streetLine2;

        return $this;
    }


    /**
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }


    /**
     * @param string $locality
     *
     * @return self
     */
    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }


    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }


    /**
     * @param string $region
     *
     * @return self
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }


    /**
     * @return Attribute\PostalCode
     */
    public function getPostalCode(): Attribute\PostalCode
    {
        return $this->postalCode;
    }


    /**
     * @param Attribute\PostalCode $postalCode
     *
     * @return self
     */
    public function setPostalCode(Attribute\PostalCode $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }




}
