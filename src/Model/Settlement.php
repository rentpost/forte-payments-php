<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints;

/**
 * This entire model is "read only" from the API. Hence the validation has been kept simple
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Settlement extends AbstractModel
{

    /** @var Attribute\Id\OrganizationId */
    protected $organizationId;

    /** @var Attribute\Id\LocationId */
    protected $locationId;

    /** @var Attribute\Id\CustomerToken */
    protected $customerToken;

    /** @var string */
    protected $customerId;

    /** @var string */
    protected $orderNumber;

    /** @var string */
    protected $referenceId;

    /** @var Attribute\Id\SettlementId */
    protected $settleId;

    /** @var string */
    protected $transactionId;

    /** @var string|null */
    protected $settleBatchId;

    /** @var Attribute\DateTime */
    protected $settleDate;

    /** @var string */
    protected $settleType;

    /** @var string */
    protected $settleResponseCode;

    /** @var Attribute\Decimal */
    protected $settleAmount;

    /** @var string */
    protected $method;


    /**
     * The identification number of the associated organization.
     * For example, org_5551236.
     */
    public function getOrganizationId(): Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\OrganizationId $organizationId
     */
    public function setOrganizationId(Attribute\Id\OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    /**
     * The identification number of the associated location.
     * For example, loc_1234568.
     */
    public function getLocationId(): Attribute\Id\LocationId
    {
        return $this->locationId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\LocationId $locationId
     */
    public function setLocationId(Attribute\Id\LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    /**
     * A unique string used to represent a customer.
     * For example, cst_SoGUG6mcLUS1nVzYBIbk3g. [max length = 26]
     */
    public function getCustomerToken(): Attribute\Id\CustomerToken
    {
        return $this->customerToken;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\CustomerToken $customerToken
     */
    public function setCustomerToken(Attribute\Id\CustomerToken $customerToken): self
    {
        $this->customerToken = $customerToken;

        return $this;
    }


    /**
     * A merchant-defined string created at the customer level to identify the customer.
     * [max length = 15]
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }


    /**
     * @internal api read only field
     *
     * @param string $customerId
     */
    public function setCustomerId(string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }


    /**
     * A merchant-defined string. [max length = 50]
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
     * A merchant-defined string that identifies the transaction.
     * [max length = 50]
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }


    /**
     * @internal api read only field
     *
     * @param string $referenceId
     */
    public function setReferenceId(string $referenceId): self
    {
        $this->referenceId = $referenceId;

        return $this;
    }


    /**
     * The settlement ID of the settled transaction
     * (e.g., stl_51cf4633-1767-484f-8784-be76a4076791). [max length = 40]
     */
    public function getSettleId(): Attribute\Id\SettlementId
    {
        return $this->settleId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\SettlementId $settleId
     */
    public function setSettleId(Attribute\Id\SettlementId $settleId): self
    {
        $this->settleId = $settleId;

        return $this;
    }


    /**
     * A 36-character code that uniquely identifies the transaction.
     */
    public function getTransactionId(): Attribute\Id\TransactionId
    {
        return $this->transactionId;
    }


    /**
     * @internal api read only field
     *
     * @param Attribute\Id\TransactionId $transactionId
     */
    public function setTransactionId(Attribute\Id\TransactionId $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }


    /**
     * The ID of the credit card settlement batch, which the merchant can use to reconcile
     * credit card bank deposits. This parameter is view-only and only for credit card transactions.
     */
    public function getSettleBatchId(): ?string
    {
        return $this->settleBatchId;
    }


    /**
     * @internal api read only field
     *
     * @param string|null $settleBatchId
     */
    public function setSettleBatchId(?string $settleBatchId): self
    {
        $this->settleBatchId = $settleBatchId;

        return $this;
    }


    /**
     * The date when the transaction was settled. This parameter is return only.
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
     * The type of settlement. Supported settlement types include the following values.
     * For echeck transactions:
     *      deposit
     *      reject
     *      withdrawal
     * For credit card transactions:
     *      deposit
     *      withdrawal
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
     * See the Response Codes table for more information. This parameter is return only.
     *
     * @see http://www.forte.net/devdocs/reference/response_codes.htm
     *
     * @note credit card transactions that do not return a settle response can be considered settled.
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
     * The amount the transaction settled for. This parameter is return only.
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
     * The payment method. This parameter is return only.
     * The supported payment methods include the following values:
     *      echeck
     *      cc
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
