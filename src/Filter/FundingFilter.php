<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * #forte-api-quirk January 2018 - if values are not provided for start_effective_date or
 *                  end_effective_date the Forte will assume values. This can be a little
 *                  deceptive hence these filters are required in this library.
 */
class FundingFilter extends AbstractFilter
{
    /**
     * @var Attribute\Id\OrganizationId
     */
//    protected $organizationId;

    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_effective_date and end_effective_date are both always required")
     */
    protected $startEffectiveDate;
    
    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_effective_date and end_effective_date are both always required")
     */
    protected $endEffectiveDate;

    /**
     * @var Attribute\Money
     */
    protected $startNetAmount;

    /**
     * @var Attribute\Money
     */
    protected $endNetAmount;

    /**
     * @var Attribute\BankRoutingNumber
     */
    protected $routingNumber;

    /**
     * @var string
     */
    protected $bankInformation;

    /**
     * @var Attribute\Id\LocationId
     */
    protected $locationId;

    /**
     * @var string
     */
    protected $last4AccountNumber;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $status;


    /**
     * @return Attribute\Id\OrganizationId
     */
//    public function getOrganizationId(): Attribute\Id\OrganizationId
//    {
//        return $this->organizationId;
//    }


    /**
     * @param Attribute\Id\OrganizationId $organizationId
     *
     * @return self
     */
//    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
//    {
//        $this->organizationId = $organizationId;
//
//        return $this;
//    }


    /**
     * @return Attribute\Date
     */
    public function getStartEffectiveDate(): Attribute\Date
    {
        return $this->startEffectiveDate;
    }


    /**
     * @param Attribute\Date $startEffectiveDate
     *
     * @return self
     */
    public function setStartEffectiveDate(Attribute\Date $startEffectiveDate): self
    {
        $this->startEffectiveDate = $startEffectiveDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndEffectiveDate(): Attribute\Date
    {
        return $this->endEffectiveDate;
    }


    /**
     * @param Attribute\Date $endEffectiveDate
     *
     * @return self
     */
    public function setEndEffectiveDate(Attribute\Date $endEffectiveDate): self
    {
        $this->endEffectiveDate = $endEffectiveDate;

        return $this;
    }


    /**
     * @return Attribute\Money
     */
    public function getStartNetAmount(): ?Attribute\Money
    {
        return $this->startNetAmount;
    }


    /**
     * @param Attribute\Money $startNetAmount
     *
     * @return self
     */
    public function setStartNetAmount(Attribute\Money $startNetAmount): self
    {
        $this->startNetAmount = $startNetAmount;

        return $this;
    }


    /**
     * @return Attribute\Money
     */
    public function getEndNetAmount(): ?Attribute\Money
    {
        return $this->endNetAmount;
    }


    /**
     * @param Attribute\Money $endNetAmount
     *
     * @return self
     */
    public function setEndNetAmount(Attribute\Money $endNetAmount): self
    {
        $this->endNetAmount = $endNetAmount;

        return $this;
    }


    /**
     * @return Attribute\BankRoutingNumber
     */
    public function getRoutingNumber(): ?Attribute\BankRoutingNumber
    {
        return $this->routingNumber;
    }


    /**
     * @param Attribute\BankRoutingNumber $routingNumber
     *
     * @return self
     */
    public function setRoutingNumber(Attribute\BankRoutingNumber $routingNumber): self
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }


    /**
     * @return string
     */
    public function getBankInformation(): ?string
    {
        return $this->bankInformation;
    }


    /**
     * @param string $bankInformation
     *
     * @return self
     */
    public function setBankInformation(string $bankInformation): self
    {
        $this->bankInformation = $bankInformation;

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
     * @return string
     */
    public function getLast4AccountNumber(): ?string
    {
        return $this->last4AccountNumber;
    }


    /**
     * @param string $last4AccountNumber
     *
     * @return self
     */
    public function setLast4AccountNumber(string $last4AccountNumber): self
    {
        $this->last4AccountNumber = $last4AccountNumber;

        return $this;
    }


    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }


    /**
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }


    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }


    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
    
    
}