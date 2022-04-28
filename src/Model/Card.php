<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Card model
 *
 * @author Sam Anthony <sam@rentpost.com>
 */
class Card extends AbstractModel
{

    /**
     * @var string
     */
    #[Assert\NotBlank]
    #[Assert\Choice(['mast', 'visa', 'amex', 'disc', 'dine', 'jcb'])]
    protected $cardType;

    /**
     * api read only field
     * @var string
     */
    protected $last4AccountNumber;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    protected $nameOnCard;

    /**
     * @var string Card number
     */
    #[Assert\NotBlank]
    protected $accountNumber;

    /**
     * @var int
     */
    #[Assert\NotBlank]
    protected $expireMonth;

    /**
     * @var int
     */
    #[Assert\NotBlank]
    protected $expireYear;

    /**
     * @var string
     */
    #[Assert\Length(max: 5)]
    protected $cardVerificationValue;

    /**
     * @var bool
     */
    protected $procurementCard;

    /**
     * @var string
     */
    #[Assert\Length(max: 17)]
    protected $customerAccountingCode;

    /**
     * @var Attribute\Id\OneTimeToken
     */
    protected $oneTimeToken;

    /**
     * @var string  eight-digit value
     */
    #[Assert\Length(max: 20)]
    protected $cardReader;

    /**
     * @var string
     */
    #[Assert\Length(max: 1500)]
    protected $cardData;


    /**
     * Gets the card type
     */
    public function getCardType(): string
    {
        return $this->cardType;
    }


    /**
     * Sets the card type
     *
     * @param string $cardType
     */
    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }


    /**
     * Gets the last 4 digits of the account number
     */
    public function getLast4AccountNumber(): ?string
    {
        return $this->last4AccountNumber;
    }


    /**
     * @internal api read only field
     *
     * @param string $last4AccountNumber
     */
    public function setLast4AccountNumber(string $last4AccountNumber): self
    {
        $this->last4AccountNumber = $last4AccountNumber;

        return $this;
    }


    /**
     * Gets the cardholder's name
     */
    public function getNameOnCard(): string
    {
        return $this->nameOnCard;
    }


    /**
     * Sets the cardholder's name
     *
     * @param string $nameOnCard
     */
    public function setNameOnCard(string $nameOnCard): self
    {
        $this->nameOnCard = $nameOnCard;

        return $this;
    }


    /**
     * Gets the account number
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }


    /**
     * Sets the account number
     *
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }


    /**
     * Gets the expiration month
     */
    public function getExpireMonth(): int
    {
        return $this->expireMonth;
    }


    /**
     * Sets the expiration month
     *
     * @param int $expireMonth
     */
    public function setExpireMonth(int $expireMonth): self
    {
        $this->expireMonth = $expireMonth;

        return $this;
    }


    /**
     * Gets the expiration year
     */
    public function getExpireYear(): int
    {
        return $this->expireYear;
    }


    /**
     * Sets the expiration year
     *
     * @param int $expireYear
     */
    public function setExpireYear(int $expireYear): self
    {
        $this->expireYear = $expireYear;

        return $this;
    }


    /**
     * Gets the credit card verification value
     */
    public function getCardVerificationValue(): ?string
    {
        return $this->cardVerificationValue;
    }


    /**
     * Sets the credit card verification value
     *
     * @param string|null $cardVerificationValue
     */
    public function setCardVerificationValue(?string $cardVerificationValue): self
    {
        $this->cardVerificationValue = $cardVerificationValue;

        return $this;
    }


    /**
     * Checks to see if the card is a procurement card
     */
    public function isProcurementCard(): ?bool
    {
        return $this->procurementCard;
    }


    /**
     * Sets if the card is a procurement card
     *
     * @param bool $procurementCard
     */
    public function setProcurementCard(bool $procurementCard): self
    {
        $this->procurementCard = $procurementCard;

        return $this;
    }


    /**
     * Gets the customer accounting code
     */
    public function getCustomerAccountingCode(): ?string
    {
        return $this->customerAccountingCode;
    }


    /**
     * Sets the customer accounting code
     *
     * @param string $customerAccountingCode
     */
    public function setCustomerAccountingCode(string $customerAccountingCode): self
    {
        $this->customerAccountingCode = $customerAccountingCode;

        return $this;
    }


    /**
     * Gets a one-time token
     */
    public function getOneTimeToken(): ?Attribute\Id\OneTimeToken
    {
        return $this->oneTimeToken;
    }


    /**
     * Sets a one-time token
     *
     * @param Attribute\Id\OneTimeToken $oneTimeToken
     */
    public function setOneTimeToken(Attribute\Id\OneTimeToken $oneTimeToken): self
    {
        $this->oneTimeToken = $oneTimeToken;

        return $this;
    }


    /**
     * Gets the card reader used
     */
    public function getCardReader(): ?string
    {
        return $this->cardReader;
    }


    /**
     * Sets the card reader used
     *
     * @param string $cardReader
     */
    public function setCardReader(string $cardReader): self
    {
        $this->cardReader = $cardReader;

        return $this;
    }


    /**
     * Gets the card data
     */
    public function getCardData(): ?string
    {
        return $this->cardData;
    }


    /**
     * Sets the card data
     *
     * @param string $cardData
     */
    public function setCardData(string $cardData): self
    {
        $this->cardData = $cardData;

        return $this;
    }
}
