<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Attribute\Decimal;
use Rentpost\ForteApi\Attribute\Id\CustomerToken;
use Rentpost\ForteApi\Attribute\Id\FundingId;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Id\SettlementId;
use Rentpost\ForteApi\Attribute\Id\TransactionId;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entire model is "read only" from the API. Hence the validation has been kept simple
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Settlement extends AbstractModel
{

    protected OrganizationId $organizationId;
    protected LocationId $locationId;
    protected ?FundingId $fundingId;
    protected ?CustomerToken $customerToken;
    protected ?string $customerId;
    protected ?string $orderNumber;
    protected ?string $referenceId;
    protected SettlementId $settleId;
    protected ?TransactionId $transactionId;
    protected ?string $settleBatchId;
    protected ?DateTime $settleDate;

    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Choice(['deposit', 'reject', 'withdrawal'])]
    protected ?string $settleType;

    protected ?string $settleResponseCode = null;
    protected ?Decimal $settleAmount;

    #[Assert\Choice(['echeck', 'cc'])]
    protected string $method;


    /**
     * The identification number of the associated organization.
     * For example, org_5551236.
     */
    public function getOrganizationId(): OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    /**
     * The identification number of the associated location.
     * For example, loc_1234568.
     */
    public function getLocationId(): LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    /**
     * The identification number of the funding.
     * For example, fnd_1234568.
     */
    public function getFundingId(): ?FundingId
    {
        return $this->fundingId;
    }


    public function setFundingId(FundingId $fundingId): self
    {
        $this->fundingId = $fundingId;

        return $this;
    }


    /**
     * A unique string used to represent a customer.
     * For example, cst_SoGUG6mcLUS1nVzYBIbk3g. [max length = 26]
     */
    public function getCustomerToken(): ?CustomerToken
    {
        return $this->customerToken;
    }


    /**
     * @internal api read only field
     */
    public function setCustomerToken(CustomerToken $customerToken): self
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
    public function getSettleId(): SettlementId
    {
        return $this->settleId;
    }


    /**
     * @internal api read only field
     */
    public function setSettleId(SettlementId $settleId): self
    {
        $this->settleId = $settleId;

        return $this;
    }


    /**
     * A 36-character code that uniquely identifies the transaction.
     */
    public function getTransactionId(): TransactionId
    {
        return $this->transactionId;
    }


    /**
     * @internal api read only field
     */
    public function setTransactionId(TransactionId $transactionId): self
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
     */
    public function setSettleBatchId(?string $settleBatchId): self
    {
        $this->settleBatchId = $settleBatchId;

        return $this;
    }


    /**
     * The date when the transaction was settled. This parameter is return only.
     */
    public function getSettleDate(): ?DateTime
    {
        return $this->settleDate;
    }


    /**
     * @internal api read only field
     */
    public function setSettleDate(DateTime $settleDate): self
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
    public function getSettleType(): ?string
    {
        return $this->settleType;
    }


    /**
     * @internal api read only field
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
     * @internal credit card transactions that do not return a settle response can be considered settled.
     */
    public function getSettleResponseCode(): ?string
    {
        return $this->settleResponseCode;
    }


    /**
     * @internal api read only field
     */
    public function setSettleResponseCode(?string $settleResponseCode): self
    {
        $this->settleResponseCode = $settleResponseCode;

        return $this;
    }


    /**
     * The amount the transaction settled for. This parameter is return only.
     */
    public function getSettleAmount(): ?Decimal
    {
        return $this->settleAmount;
    }


    /**
     * @internal api read only field
     */
    public function setSettleAmount(Decimal $settleAmount): self
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
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }
}
