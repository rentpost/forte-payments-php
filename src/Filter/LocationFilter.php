<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;


/**
 * Filter for locations endpoints
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class LocationFilter extends AbstractFilter
{

    protected Attribute\Date $startCreatedDate;
    protected Attribute\Date $endCreatedDate;
    protected string $status;
    protected string $region;
    protected string $country;


    public function getStartCreatedDate(): Attribute\Date
    {
        return $this->startCreatedDate;
    }


    public function setStartCreatedDate(Attribute\Date $startCreatedDate): self
    {
        $this->startCreatedDate = $startCreatedDate;

        return $this;
    }


    public function getEndCreatedDate(): Attribute\Date
    {
        return $this->endCreatedDate;
    }


    public function setEndCreatedDate(Attribute\Date $endCreatedDate): self
    {
        $this->endCreatedDate = $endCreatedDate;

        return $this;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function setStatus(string $status): self
    {
        $this->status = $status;

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


    public function getCountry(): string
    {
        return $this->country;
    }


    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
