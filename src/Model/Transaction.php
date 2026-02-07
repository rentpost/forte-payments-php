<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\DateTime;
use Rentpost\ForteApi\Attribute\Id\CustomerToken;
use Rentpost\ForteApi\Attribute\Id\LocationId;
use Rentpost\ForteApi\Attribute\Id\OrganizationId;
use Rentpost\ForteApi\Attribute\Id\TransactionId;
use Rentpost\ForteApi\Attribute\IpAddress;
use Rentpost\ForteApi\Attribute\Money;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Transaction model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Transaction extends AbstractModel
{

    protected OrganizationId $organizationId;
    protected LocationId $locationId;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['sale', 'authorize', 'credit', 'void', 'capture', 'inquiry', 'verify', 'force', 'reverse'])]
    protected string $action;

    protected string $status;

    protected CustomerToken $customerToken;

    #[Assert\Length(max: 15)]
    protected ?string $customerId = null;

    protected ?string $paymethodToken = null;

    #[Assert\Length(max: 15)]
    protected ?string $referenceId = null;

    protected Money $authorizationAmount;

    #[Assert\Length(max: 36)]
    protected ?string $orderNumber = null;

    protected ?TransactionId $originalTransactionId = null;
    protected ?TransactionId $transactionId = null;
    protected string $authorizationCode;

    #[Assert\Length(max: 50)]
    protected ?string $enteredBy = null;

    // API read only
    protected ?DateTime $receivedDate;

    // API read only
    protected ?DateTime $originationDate;

    protected ?Money $salesTaxAmount = null;

    // API read only
    protected ?Money $subtotalAmount;

    protected ?Money $serviceFeeAmount = null;
    protected ?bool $recurringIndicator = null;
    protected ?IpAddress $customerIpAddress = null;

    #[Assert\Choice(choices: ['customer', 'paymethod'])]
    protected ?string $saveToken = null;

    // API read only
    protected ?string $attemptNumber;

    // API read only
    protected ?int $cofTransactionType;

    protected ?string $cofInitialTransactionId = null;

    #[Assert\Valid]
    protected Address $billingAddress;

    #[Assert\Valid]
    protected ?Address $shippingAddress = null;

    #[Assert\Valid]
    protected ?Card $card = null;

    #[Assert\Valid]
    protected ?Echeck $echeck = null;

    #[Assert\Valid]
    protected ?LineItems $lineItems = null;

    #[Assert\Valid]
    protected ?Xdata $xdata = null;


    public function getOrganizationId(): OrganizationId
    {
        return $this->organizationId;
    }


    public function setOrganizationId(OrganizationId $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    public function getLocationId(): LocationId
    {
        return $this->locationId;
    }


    public function setLocationId(LocationId $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }


    public function getAction(): string
    {
        return $this->action;
    }


    public function setAction(string $action): self
    {
        $this->action = $action;

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


    public function getCustomerToken(): CustomerToken
    {
        return $this->customerToken;
    }


    public function setCustomerToken(CustomerToken $customerToken): self
    {
        $this->customerToken = $customerToken;

        return $this;
    }


    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }


    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }


    public function getPaymethodToken(): ?string
    {
        return $this->paymethodToken;
    }


    public function setPaymethodToken(?string $paymethodToken): self
    {
        $this->paymethodToken = $paymethodToken;

        return $this;
    }


    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }


    public function setReferenceId(?string $referenceId): self
    {
        $this->referenceId = $referenceId;

        return $this;
    }


    public function getAuthorizationAmount(): Money
    {
        return $this->authorizationAmount;
    }


    public function setAuthorizationAmount(Money $authorizationAmount): self
    {
        $this->authorizationAmount = $authorizationAmount;

        return $this;
    }


    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }


    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }


    public function getOriginalTransactionId(): ?TransactionId
    {
        return $this->originalTransactionId;
    }


    public function setOriginalTransactionId(?TransactionId $originalTransactionId): self
    {
        $this->originalTransactionId = $originalTransactionId;

        return $this;
    }


    public function getTransactionId(): ?TransactionId
    {
        return $this->transactionId;
    }


    public function setTransactionId(?TransactionId $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }


    public function getAuthorizationCode(): string
    {
        return $this->authorizationCode;
    }


    public function setAuthorizationCode(string $authorizationCode): self
    {
        $this->authorizationCode = $authorizationCode;

        return $this;
    }


    public function getEnteredBy(): ?string
    {
        return $this->enteredBy;
    }


    public function setEnteredBy(?string $enteredBy): self
    {
        $this->enteredBy = $enteredBy;

        return $this;
    }


    public function getReceivedDate(): ?DateTime
    {
        return $this->receivedDate;
    }


    public function getOriginationDate(): ?DateTime
    {
        return $this->originationDate;
    }


    public function getSalesTaxAmount(): ?Money
    {
        return $this->salesTaxAmount;
    }


    public function setSalesTaxAmount(?Money $salesTaxAmount): self
    {
        $this->salesTaxAmount = $salesTaxAmount;

        return $this;
    }


    public function getSubtotalAmount(): ?Money
    {
        return $this->subtotalAmount;
    }


    public function getServiceFeeAmount(): ?Money
    {
        return $this->serviceFeeAmount;
    }


    public function setServiceFeeAmount(?Money $serviceFeeAmount): self
    {
        $this->serviceFeeAmount = $serviceFeeAmount;

        return $this;
    }


    public function getRecurringIndicator(): ?bool
    {
        return $this->recurringIndicator;
    }


    public function setRecurringIndicator(?bool $recurringIndicator): self
    {
        $this->recurringIndicator = $recurringIndicator;

        return $this;
    }


    public function getCustomerIpAddress(): ?IpAddress
    {
        return $this->customerIpAddress;
    }


    public function setCustomerIpAddress(?IpAddress $customerIpAddress): self
    {
        $this->customerIpAddress = $customerIpAddress;

        return $this;
    }


    public function getSaveToken(): ?string
    {
        return $this->saveToken;
    }


    public function setSaveToken(?string $saveToken): self
    {
        $this->saveToken = $saveToken;

        return $this;
    }


    public function getAttemptNumber(): ?string
    {
        return $this->attemptNumber;
    }


    public function getCofTransactionType(): ?int
    {
        return $this->cofTransactionType;
    }


    public function getCofInitialTransactionId(): ?string
    {
        return $this->cofInitialTransactionId;
    }


    public function setCofInitialTransactionId(?string $cofInitialTransactionId): self
    {
        $this->cofInitialTransactionId = $cofInitialTransactionId;

        return $this;
    }


    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }


    public function setBillingAddress(Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }


    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }


    public function setShippingAddress(?Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }


    public function getCard(): ?Card
    {
        return $this->card;
    }


    public function setCard(?Card $card): self
    {
        $this->card = $card;

        return $this;
    }


    public function getEcheck(): ?Echeck
    {
        return $this->echeck;
    }


    public function setEcheck(?Echeck $echeck): self
    {
        $this->echeck = $echeck;

        return $this;
    }


    public function getLineItems(): ?LineItems
    {
        return $this->lineItems;
    }


    public function setLineItems(?LineItems $lineItems): self
    {
        $this->lineItems = $lineItems;

        return $this;
    }


    public function getXdata(): ?Xdata
    {
        return $this->xdata;
    }


    public function setXdata(?Xdata $xdata): self
    {
        $this->xdata = $xdata;

        return $this;
    }
}
