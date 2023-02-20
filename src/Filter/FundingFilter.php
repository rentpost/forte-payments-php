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

    #[Assert\NotNull(message: 'start_effective_date and end_effective_date are both always required')]
    protected ?Attribute\Date $startEffectiveDate = null;

    #[Assert\NotNull(message: 'start_effective_date and end_effective_date are both always required')]
    protected ?Attribute\Date $endEffectiveDate = null;

    protected ?Attribute\Money $startNetAmount = null;
    protected ?Attribute\Money $endNetAmount = null;
    protected ?Attribute\BankRoutingNumber $routingNumber = null;
    protected ?string $bankInformation = null;
    protected ?Attribute\Id\LocationId $locationId = null;
    protected ?string $last4AccountNumber = null;
    protected ?string $code = null;
    protected ?string $status = null;


    public function getStartEffectiveDate(): Attribute\Date
    {
        return $this->startEffectiveDate;
    }


    public function setStartEffectiveDate(Attribute\Date $startEffectiveDate): self
    {
        $this->startEffectiveDate = $startEffectiveDate;

        return $this;
    }


    public function getEndEffectiveDate(): Attribute\Date
    {
        return $this->endEffectiveDate;
    }


    public function setEndEffectiveDate(Attribute\Date $endEffectiveDate): self
    {
        $this->endEffectiveDate = $endEffectiveDate;

        return $this;
    }


    public function getStartNetAmount(): ?Attribute\Money
    {
        return $this->startNetAmount;
    }


    public function setStartNetAmount(Attribute\Money $startNetAmount): self
    {
        $this->startNetAmount = $startNetAmount;

        return $this;
    }


    public function getEndNetAmount(): ?Attribute\Money
    {
        return $this->endNetAmount;
    }


    public function setEndNetAmount(Attribute\Money $endNetAmount): self
    {
        $this->endNetAmount = $endNetAmount;

        return $this;
    }


    public function getRoutingNumber(): ?Attribute\BankRoutingNumber
    {
        return $this->routingNumber;
    }


    public function setRoutingNumber(Attribute\BankRoutingNumber $routingNumber): self
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }


    public function getBankInformation(): ?string
    {
        return $this->bankInformation;
    }


    public function setBankInformation(string $bankInformation): self
    {
        $this->bankInformation = $bankInformation;

        return $this;
    }


    public function getLocationId(): ?Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    public function getLast4AccountNumber(): ?string
    {
        return $this->last4AccountNumber;
    }


    public function setLast4AccountNumber(string $last4AccountNumber): self
    {
        $this->last4AccountNumber = $last4AccountNumber;

        return $this;
    }


    public function getCode(): ?string
    {
        return $this->code;
    }


    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }


    public function getStatus(): ?string
    {
        return $this->status;
    }


    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
