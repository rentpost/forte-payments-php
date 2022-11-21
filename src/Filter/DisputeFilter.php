<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

class DisputeFilter extends AbstractFilter
{
    /**
     * @var string
     */
    protected $disputeNumber;

    /**
     * @var Attribute\Date
     */
    protected $startDueDate;

    /**
     * @var Attribute\Date
     */
    protected $endDueDate;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var Attribute\Id\LocationId
     */
    protected $locationId;

    /**
     * @var Attribute\Money
     */
    protected $amount;

    /**
     * @var string
     */
    protected $cardType;

    /**
     * @var string
     */
    protected $actionCode;

    /**
     * @var string
     */
    protected $nameOnCard;

    /**
     * @var string
     */
    protected $last4AccountNumber;


    /**
     * @return string
     */
    public function getDisputeNumber(): string
    {
        return $this->disputeNumber;
    }


    /**
     * @param string $disputeNumber
     *
     * @return self
     */
    public function setDisputeNumber(string $disputeNumber): self
    {
        $this->disputeNumber = $disputeNumber;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getStartDueDate(): Attribute\Date
    {
        return $this->startDueDate;
    }


    /**
     * @param Attribute\Date $startDueDate
     *
     * @return self
     */
    public function setStartDueDate(Attribute\Date $startDueDate): self
    {
        $this->startDueDate = $startDueDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndDueDate(): Attribute\Date
    {
        return $this->endDueDate;
    }


    /**
     * @param Attribute\Date $endDueDate
     *
     * @return self
     */
    public function setEndDueDate(Attribute\Date $endDueDate): self
    {
        $this->endDueDate = $endDueDate;

        return $this;
    }


    /**
     * @return string
     */
    public function getStatus(): string
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


    /**
     * @return Attribute\Id\LocationId
     */
    public function getLocationId(): Attribute\Id\LocationId
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
     * @return Attribute\Money
     */
    public function getAmount(): Attribute\Money
    {
        return $this->amount;
    }


    /**
     * @param Attribute\Money $amount
     *
     * @return self
     */
    public function setAmount(Attribute\Money $amount): self
    {
        $this->amount = $amount;

        return $this;
    }


    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->cardType;
    }


    /**
     * @param string $cardType
     *
     * @return self
     */
    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }


    /**
     * @return string
     */
    public function getActionCode(): string
    {
        return $this->actionCode;
    }


    /**
     * @param string $actionCode
     *
     * @return self
     */
    public function setActionCode(string $actionCode): self
    {
        $this->actionCode = $actionCode;

        return $this;
    }


    /**
     * @return string
     */
    public function getNameOnCard(): string
    {
        return $this->nameOnCard;
    }


    /**
     * @param string $nameOnCard
     *
     * @return self
     */
    public function setNameOnCard(string $nameOnCard): self
    {
        $this->nameOnCard = $nameOnCard;

        return $this;
    }


    /**
     * @return string
     */
    public function getLast4AccountNumber(): string
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
}
