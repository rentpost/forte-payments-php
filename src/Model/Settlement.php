<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints;

/**
 * This entire model is "read only" from the API. Hence the validation has been kept simple
 */
class Settlement extends AbstractModel
{

    /**
     * @var Attribute\Id\OrganizationId
     */
    protected $organizationId;

    /**
     * @var Attribute\Id\LocationId
     */
    protected $locationId;

    /**
     * @var Attribute\Id\CustomerToken
     */
    protected $customerToken;

    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $referenceId;

    /**
     * @var Attribute\Id\SettlementId
     */
    protected $settleId;

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $settleBatchId;

    /**
     * @var Attribute\DateTime
     */
    protected $settleDate;

    /**
     * @var string
     */
    protected $settleType;

    /**
     * @var string
     */
    protected $settleResponseCode;

    /**
     * @var Attribute\Decimal
     */
    protected $settleAmount;

    /**
     * @var string
     */
    protected $method;


    /**
     * @return Attribute\Id\OrganizationId
     */
    public function getOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\OrganizationId $organizationId
     *
     * @return self
     */
    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

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
     * @internal api read only field
     *
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
     * @return Attribute\Id\CustomerToken
     */
    public function getCustomerToken(): Attribute\Id\CustomerToken
    {
        return $this->customerToken;
    }


    /**
     * @internal api read only field
     *
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
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }


    /**
     * @internal api read only field
     *
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
     * @internal api read only field
     *
     * @param string|null $orderNumber
     *
     * @return self
     */
    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }


    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }


    /**
     * @internal api read only field
     *
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
     * @return Attribute\Id\SettlementId
     */
    public function getSettleId(): Attribute\Id\SettlementId
    {
        return $this->settleId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\SettlementId $settleId
     *
     * @return self
     */
    public function setSettleId(Attribute\Id\SettlementId $settleId): self
    {
        $this->settleId = $settleId;

        return $this;
    }


    /**
     * @return Attribute\Id\TransactionId
     */
    public function getTransactionId(): Attribute\Id\TransactionId
    {
        return $this->transactionId;
    }


    /**
     * @internal api read only field
     *
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
     * @return string
     */
    public function getSettleBatchId(): string
    {
        return $this->settleBatchId;
    }


    /**
     * @internal api read only field
     *
     * @param string $settleBatchId
     *
     * @return self
     */
    public function setSettleBatchId(string $settleBatchId): self
    {
        $this->settleBatchId = $settleBatchId;

        return $this;
    }


    /**
     * @return Attribute\DateTime
     */
    public function getSettleDate(): Attribute\DateTime
    {
        return $this->settleDate;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\DateTime $settleDate
     *
     * @return self
     */
    public function setSettleDate(Attribute\DateTime $settleDate): self
    {
        $this->settleDate = $settleDate;

        return $this;
    }


    /**
     * @return string
     */
    public function getSettleType(): string
    {
        return $this->settleType;
    }


    /**
     * @internal api read only field
     *
     * @param string $settleType
     *
     * @return self
     */
    public function setSettleType(string $settleType): self
    {
        $this->settleType = $settleType;

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
     * @internal api read only field
     *
     * @param string|null $settleResponseCode
     *
     * @return self
     */
    public function setSettleResponseCode(?string $settleResponseCode): self
    {
        $this->settleResponseCode = $settleResponseCode;

        return $this;
    }


    /**
     * @return Attribute\Decimal
     */
    public function getSettleAmount(): Attribute\Decimal
    {
        return $this->settleAmount;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Decimal $settleAmount
     *
     * @return self
     */
    public function setSettleAmount(Attribute\Decimal $settleAmount): self
    {
        $this->settleAmount = $settleAmount;

        return $this;
    }


    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }


    /**
     * @internal api read only field
     *
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