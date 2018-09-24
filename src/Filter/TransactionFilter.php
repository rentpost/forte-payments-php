<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Filter;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * #forte-api-quirk January 2018 - if values are not provided for start_received_date or
 *                  end_received_date the Forte will assume values. This can be a little
 *                  deceptive, therefore we have made these filters required in this library.
 *                  start_origination_date and end_origination_date will also behave deceptively
 *                  hence either both can be used, or neither can be used
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class TransactionFilter extends AbstractFilter
{
    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_received_date and end_received_date are both always required")
     */
    protected $startReceivedDate;

    /**
     * @var Attribute\Date
     * @Assert\NotBlank(message="start_received_date and end_received_date are both always required")
     */
    protected $endReceivedDate;


    /**
     * @var Attribute\Date
     * @Assert\Expression(
     *      "(not this.getStartOriginationDate() and not this.getEndOriginationDate()) or (this.getStartOriginationDate() and this.getEndOriginationDate())",
     *      message="you must set both start_origination_date and end_origination_date or neither"
     * )
     */
    protected $startOriginationDate;

    /**
     * @var Attribute\Date
     */
    protected $endOriginationDate;

    /**
     * @var Attribute\Date
     */
    protected $receivedDate;

    /**
     * @var Attribute\Date
     */
    protected $originationDate;

    /**
     * @var Attribute\Id\CustomerToken
     */
    protected $customerToken;

    /**
     * @var Attribute\Id\PaymethodToken
     */
    protected $paymethodToken;

    /**
     * @var Attribute\Id\TransactionId
     */
    protected $originalTransactionId;

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
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var Attribute\Money
     */
    protected $authorizationAmount;

    /**
     * @var string
     */
    protected $enteredBy;

    /**
     * @var string
     */
    protected $billToCompanyName;

    /**
     * @var string
     */
    protected $billToFirstName;

    /**
     * @var string
     */
    protected $billToLastName;

    /**
     * @var string
     */
    protected $paymethodType;

    /**
     * @var string
     */
    protected $last4AccountNumber;

    /**
     * @var string
     */
    protected $responseCode;

    /**
     * @return Attribute\Date
     */
    public function getStartReceivedDate(): ?Attribute\Date
    {
        return $this->startReceivedDate;
    }


    /**
     * @param Attribute\Date $startReceivedDate
     *
     * @return self
     */
    public function setStartReceivedDate(Attribute\Date $startReceivedDate): self
    {
        $this->startReceivedDate = $startReceivedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndReceivedDate(): ?Attribute\Date
    {
        return $this->endReceivedDate;
    }


    /**
     * @param Attribute\Date $endReceivedDate
     *
     * @return self
     */
    public function setEndReceivedDate(Attribute\Date $endReceivedDate): self
    {
        $this->endReceivedDate = $endReceivedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getStartOriginationDate(): ?Attribute\Date
    {
        return $this->startOriginationDate;
    }


    /**
     * @param Attribute\Date $startOriginationDate
     *
     * @return self
     */
    public function setStartOriginationDate(Attribute\Date $startOriginationDate): self
    {
        $this->startOriginationDate = $startOriginationDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getEndOriginationDate(): ?Attribute\Date
    {
        return $this->endOriginationDate;
    }


    /**
     * @param Attribute\Date $endOriginationDate
     *
     * @return self
     */
    public function setEndOriginationDate(Attribute\Date $endOriginationDate): self
    {
        $this->endOriginationDate = $endOriginationDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getReceivedDate(): ?Attribute\Date
    {
        return $this->receivedDate;
    }


    /**
     * @param Attribute\Date $receivedDate
     *
     * @return self
     */
    public function setReceivedDate(Attribute\Date $receivedDate): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }


    /**
     * @return Attribute\Date
     */
    public function getOriginationDate(): ?Attribute\Date
    {
        return $this->originationDate;
    }


    /**
     * @param Attribute\Date $originationDate
     *
     * @return self
     */
    public function setOriginationDate(Attribute\Date $originationDate): self
    {
        $this->originationDate = $originationDate;

        return $this;
    }


    /**
     * @return Attribute\Id\CustomerToken
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


    /**
     * @return string
     */
    public function getAction(): ?string
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
     * @return Attribute\Money
     */
    public function getAuthorizationAmount(): ?Attribute\Money
    {
        return $this->authorizationAmount;
    }


    /**
     * @param Attribute\Money $authorizationAmount
     *
     * @return self
     */
    public function setAuthorizationAmount(Attribute\Money $authorizationAmount): self
    {
        $this->authorizationAmount = $authorizationAmount;

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
     * @return string
     */
    public function getBillToCompanyName(): ?string
    {
        return $this->billToCompanyName;
    }


    /**
     * @param string $billToCompanyName
     *
     * @return self
     */
    public function setBillToCompanyName(string $billToCompanyName): self
    {
        $this->billToCompanyName = $billToCompanyName;

        return $this;
    }


    /**
     * @return string
     */
    public function getBillToFirstName(): ?string
    {
        return $this->billToFirstName;
    }


    /**
     * @param string $billToFirstName
     *
     * @return self
     */
    public function setBillToFirstName(string $billToFirstName): self
    {
        $this->billToFirstName = $billToFirstName;

        return $this;
    }


    /**
     * @return string
     */
    public function getBillToLastName(): ?string
    {
        return $this->billToLastName;
    }


    /**
     * @param string $billToLastName
     *
     * @return self
     */
    public function setBillToLastName(string $billToLastName): self
    {
        $this->billToLastName = $billToLastName;

        return $this;
    }


    /**
     * @return string
     */
    public function getPaymethodType(): ?string
    {
        return $this->paymethodType;
    }


    /**
     * @param string $paymethodType
     *
     * @return self
     */
    public function setPaymethodType(string $paymethodType): self
    {
        $this->paymethodType = $paymethodType;

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
    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }


    /**
     * @param string $responseCode
     *
     * @return self
     */
    public function setResponseCode(string $responseCode): self
    {
        $this->responseCode = $responseCode;

        return $this;
    }

}
