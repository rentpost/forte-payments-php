<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

class Transaction extends AbstractModel
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
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"sale", "authorize", "credit", "void", "capture", "inquiry", "verify", "force", "reverse"})
     */
    protected $action;

    /**
     * @var Attribute\Money
     */
    protected $authorizationAmount;

    /**
     * @var Attribute\Id\CustomerToken
     */
    protected $customerToekn;

    /**
     * @var string
     * @Assert\Length(max=15)
     */
    protected $customerId;

    /**
     * @var Attribute\Id\PaymethodToken
     */
    protected $paymethodToken;

    /**
     * @var string
     * @Assert\Length(max=15)
     */
    protected $referenceId;

    /**
     * @var string
     * @Assert\Length(max=36)
     */
    protected $orderNumber;

    /**
     * @var Attribute\Id\TransactionId
     */
    protected $originalTransactionId;

    /**
     * @var Attribute\Id\TransactionId
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $authorizationCode;

    /**
     * @var string
     * @Assert\Length(max=50)
     */
    protected $enteredBy;

    /**
     * Read only
     * @var Attribute\DateTime
     */
    protected $receivedDate;

    /**
     * Read only
     * @var Attribute\DateTime
     */
    protected $originationDate;

    /**
     * @var Attribute\Money
     */
    protected $salesTaxAmount;

    /**
     * Read only
     * @var Attribute\Money
     */
    protected $subtotalAmount;

    /**
     * @var Attribute\Money
     */
    protected $serviceFeeAmount;

    /**
     * @var boolean
     */
    protected $recurringIndicator;

    /**
     * @var Attribute\IpAddress
     */
    protected $customerIpAddress;

    /**
     * @var string
     * @Assert\Choice({"customer", "paymethod"})
     */
    protected $saveToken;

    /**
     * @var Model\Address
     */
    protected $billingAddress;

    /**
     * @var Model\Address
     */
    protected $shippingAddress;

    /**
     * @var Model\Card
     */
    protected $card;

    /**
     * @var Model\Echeck
     */
    protected $echeck;

    /**
     * @var Model\LineItems
     */
    protected $lineItems;

    /**
     * @var Model\Xdata
     */
    protected $xdata;


    /**
     * @return Attribute\Id\OrganizationId
     */
    public function getOrganizationId(): ?Attribute\Id\OrganizationId
    {
        return $this->organizationId;
    }


    /**
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
    public function getAction(): string
    {
        return $this->action;
    }


    /**
     * @param string $action
     *
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }


    /**
     * @return Attribute\Money|null
     */
    public function getAuthorizationAmount(): ?Attribute\Money
    {
        return $this->authorizationAmount;
    }


    /**
     * @param Attribute\Money|null $authorizationAmount
     *
     * @return self
     */
    public function setAuthorizationAmount(?Attribute\Money $authorizationAmount): self
    {
        $this->authorizationAmount = $authorizationAmount;

        return $this;
    }


    /**
     * @return Attribute\Id\CustomerToken
     */
    public function getCustomerToken(): ?Attribute\Id\CustomerToken
    {
        return $this->customerToekn;
    }


    /**
     * @param Attribute\Id\CustomerToken $customerToekn
     *
     * @return self
     */
    public function setCustomerToken(Attribute\Id\CustomerToken $customerToekn): self
    {
        $this->customerToekn = $customerToekn;

        return $this;
    }


    /**
     * @return string
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
     * @return Attribute\Id\PaymethodToken
     */
    public function getPaymethodToken(): ?Attribute\Id\PaymethodToken
    {
        return $this->paymethodToken;
    }


    /**
     * @param Attribute\Id\PaymethodToken $paymethodToken
     *
     * @return self
     */
    public function setPaymethodToken(Attribute\Id\PaymethodToken $paymethodToken): self
    {
        $this->paymethodToken = $paymethodToken;

        return $this;
    }


    /**
     * @return string
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
     * @return string
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
     * @return Attribute\Id\TransactionId
     */
    public function getOriginalTransactionId(): ?Attribute\Id\TransactionId
    {
        return $this->originalTransactionId;
    }


    /**
     * @param Attribute\Id\TransactionId $originalTransactionId
     *
     * @return self
     */
    public function setOriginalTransactionId(Attribute\Id\TransactionId $originalTransactionId): self
    {
        $this->originalTransactionId = $originalTransactionId;

        return $this;
    }


    /**
     * @return Attribute\Id\TransactionId
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
     * @return string
     */
    public function getAuthorizationCode(): ?string
    {
        return $this->authorizationCode;
    }


    /**
     * @param string $authorizationCode
     *
     * @return self
     */
    public function setAuthorizationCode(string $authorizationCode): self
    {
        $this->authorizationCode = $authorizationCode;

        return $this;
    }


    /**
     * @return string
     */
    public function getEnteredBy(): ?string
    {
        return $this->enteredBy;
    }


    /**
     * @param string $enteredBy
     *
     * @return self
     */
    public function setEnteredBy(string $enteredBy): self
    {
        $this->enteredBy = $enteredBy;

        return $this;
    }


    /**
     * @return Attribute\DateTime
     */
    public function getReceivedDate(): ?Attribute\DateTime
    {
        return $this->receivedDate;
    }


    /**
     * @param Attribute\DateTime $receivedDate
     *
     * @return self
     */
    public function setReceivedDate(Attribute\DateTime $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    /**
     * @return Attribute\DateTime
     */
    public function getOriginationDate(): ?Attribute\DateTime
    {
        return $this->originationDate;
    }


    /**
     * @param Attribute\DateTime $originationDate
     *
     * @return self
     */
    public function setOriginationDate(Attribute\DateTime $originationDate): self
    {
        $this->originationDate = $originationDate;

        return $this;
    }


    /**
     * @return Attribute\Money
     */
    public function getSalesTaxAmount(): ?Attribute\Money
    {
        return $this->salesTaxAmount;
    }


    /**
     * @param Attribute\Money $salesTaxAmount
     *
     * @return self
     */
    public function setSalesTaxAmount(Attribute\Money $salesTaxAmount): self
    {
        $this->salesTaxAmount = $salesTaxAmount;

        return $this;
    }


    /**
     * @return Attribute\Money
     */
    public function getSubtotalAmount(): ?Attribute\Money
    {
        return $this->subtotalAmount;
    }


    /**
     * @param Attribute\Money $subtotalAmount
     *
     * @return self
     */
    public function setSubtotalAmount(Attribute\Money $subtotalAmount): self
    {
        $this->subtotalAmount = $subtotalAmount;

        return $this;
    }


    /**
     * @return Attribute\Money
     */
    public function getServiceFeeAmount(): ?Attribute\Money
    {
        return $this->serviceFeeAmount;
    }


    /**
     * @param Attribute\Money $serviceFeeAmount
     *
     * @return self
     */
    public function setServiceFeeAmount(Attribute\Money $serviceFeeAmount): self
    {
        $this->serviceFeeAmount = $serviceFeeAmount;

        return $this;
    }


    /**
     * @return bool
     */
    public function getRecurringIndicator(): ?bool
    {
        return $this->recurringIndicator;
    }


    /**
     * @param string $recurringIndicator
     *
     * @return self
     */
    public function setRecurringIndicator(string $recurringIndicator): self
    {
        $this->recurringIndicator = $recurringIndicator;

        return $this;
    }


    /**
     * @return Attribute\IpAddress
     */
    public function getCustomerIpAddress(): ?Attribute\IpAddress
    {
        return $this->customerIpAddress;
    }


    /**
     * @param Attribute\IpAddress $customerIpAddress
     *
     * @return self
     */
    public function setCustomerIpAddress(Attribute\IpAddress $customerIpAddress): self
    {
        $this->customerIpAddress = $customerIpAddress;

        return $this;
    }


    /**
     * @return string
     */
    public function getSaveToken(): ?string
    {
        return $this->saveToken;
    }


    /**
     * @param string $saveToken
     *
     * @return self
     */
    public function setSaveToken(string $saveToken): self
    {
        $this->saveToken = $saveToken;

        return $this;
    }


    /**
     * @return Model\Address
     */
    public function getBillingAddress(): ?Model\Address
    {
        return $this->billingAddress;
    }


    /**
     * @param Model\Address $billingAddress
     *
     * @return self
     */
    public function setBillingAddress(Model\Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }


    /**
     * @return Model\Address
     */
    public function getShippingAddress(): ?Model\Address
    {
        return $this->shippingAddress;
    }


    /**
     * @param Model\Address $shippingAddress
     *
     * @return self
     */
    public function setShippingAddress(Model\Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }


    /**
     * @return Model\Card
     */
    public function getCard(): ?Model\Card
    {
        return $this->card;
    }


    /**
     * @param Model\Card $card
     *
     * @return self
     */
    public function setCard(Model\Card $card): self
    {
        $this->card = $card;

        return $this;
    }


    /**
     * @return Model\Echeck
     */
    public function getEcheck(): ?Model\Echeck
    {
        return $this->echeck;
    }


    /**
     * @param Model\Echeck $echeck
     *
     * @return self
     */
    public function setEcheck(Model\Echeck $echeck): self
    {
        $this->echeck = $echeck;

        return $this;
    }


    /**
     * @return Model\LineItems
     */
    public function getLineItems(): ?Model\LineItems
    {
        return $this->lineItems;
    }


    /**
     * @param Model\LineItems $lineItems
     *
     * @return self
     */
    public function setLineItems(Model\LineItems $lineItems): self
    {
        $this->lineItems = $lineItems;

        return $this;
    }


    /**
     * @return Model\Xdata
     */
    public function getXdata(): ?Model\Xdata
    {
        return $this->xdata;
    }


    /**
     * @param Model\Xdata $xdata
     *
     * @return self
     */
    public function setXdata(Model\Xdata $xdata): self
    {
        $this->xdata = $xdata;

        return $this;
    }
}
