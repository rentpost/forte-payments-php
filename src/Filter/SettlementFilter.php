<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * #forte-api-quirk January 2018 - if values are not provided for start_settle_date or
 *                  end_settle_date the Forte will assume values. This can be a little
 *                  deceptive hence these filters are required in this library.
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class SettlementFilter extends AbstractFilter
{

    /** @var Attribute\Id\LocationId */
    protected $locationId;

    /** @var Attribute\Id\CustomerToken */
    protected $customerToken;

    /** @var Attribute\Id\TransactionId */
    protected $transactionId;

    /** @var string */
    protected $customerId;

    /** @var string */
    protected $orderNumber;

    /** @var string */
    protected $referenceId;

    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_settle_date and end_settle_date are both always required")
     */
    protected $startSettleDate;

    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_settle_date and end_settle_date are both always required")
     */
    protected $endSettleDate;

    /** @var string */
    protected $settleResponseCode;

    /** @var string */
    protected $method;


    /**
     * @return Attribute\Id\LocationId|null
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
     * @return Attribute\Id\CustomerToken|null
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
     * @return Attribute\Id\TransactionId|null
     */
    public function getTransactionId(): ?Attribute\Id\TransactionId
    {
        return $this->transactionId;
    }


    /**
     * @param Attribute\Id\TransactionId $transactionId
     *
     * @return self
     */
    public function setTransactionId(Attribute\Id\TransactionId $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }


    /**
     * @param string $customerId
     *
     * @return self
     */
    public function setCustomerId(string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }


    /**
     * @param string $orderNumber
     *
     * @return self
     */
    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }


    /**
     * @param string $referenceId
     *
     * @return self
     */
    public function setReferenceId(string $referenceId): self
    {
        $this->referenceId = $referenceId;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getStartSettleDate(): Attribute\Date
    {
        return $this->startSettleDate;
    }


    /**
     * @param Attribute\Date $startSettleDate
     *
     * @return self
     */
    public function setStartSettleDate(Attribute\Date $startSettleDate): self
    {
        $this->startSettleDate = $startSettleDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndSettleDate(): Attribute\Date
    {
        return $this->endSettleDate;
    }


    /**
     * @param Attribute\Date $endSettleDate
     *
     * @return self
     */
    public function setEndSettleDate(Attribute\Date $endSettleDate): self
    {
        $this->endSettleDate = $endSettleDate;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getSettleResponseCode(): ?string
    {
        return $this->settleResponseCode;
    }


    /**
     * @param string $settleResponseCode
     *
     * @return self
     */
    public function setSettleResponseCode(string $settleResponseCode): self
    {
        $this->settleResponseCode = $settleResponseCode;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }


    /**
     * @param string $method
     *
     * @return self
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }
}
