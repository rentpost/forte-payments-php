<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Id\OneTimeToken;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Card model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Card extends AbstractModel
{

    #[Assert\NotBlank]
    #[Assert\Choice(['mast', 'visa', 'amex', 'disc', 'dine', 'jcb'])]
    protected string $cardType;

    #[Assert\NotBlank]
    protected string $nameOnCard;

    // Card number
    #[Assert\NotBlank]
    protected string $accountNumber;

    // API read only field
    protected ?string $last4AccountNumber = null;

    #[Assert\NotBlank]
    protected int $expireMonth;

    #[Assert\NotBlank]
    protected int $expireYear;

    #[Assert\Length(max: 5)]
    protected string $cardVerificationValue;

    protected ?bool $procurementCard = null;

    #[Assert\Length(max: 17)]
    protected ?string $customerAccountingCode = null;

    protected ?OneTimeToken $oneTimeToken = null;

    /**
     * Eight-digit value
     */
    #[Assert\Length(max: 20)]
    protected ?string $cardReader = null;

    #[Assert\Length(max: 1_500)]
    protected ?string $cardData = null;


    public function getCardType(): string
    {
        return $this->cardType;
    }


    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }


    public function getNameOnCard(): string
    {
        return $this->nameOnCard;
    }


    public function setNameOnCard(string $nameOnCard): self
    {
        $this->nameOnCard = $nameOnCard;

        return $this;
    }


    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }


    public function setAccountNumber(string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

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


    public function getExpireMonth(): int
    {
        return $this->expireMonth;
    }


    public function setExpireMonth(int $expireMonth): self
    {
        $this->expireMonth = $expireMonth;

        return $this;
    }


    public function getExpireYear(): int
    {
        return $this->expireYear;
    }


    public function setExpireYear(int $expireYear): self
    {
        $this->expireYear = $expireYear;

        return $this;
    }


    public function getCardVerificationValue(): string
    {
        return $this->cardVerificationValue;
    }


    public function setCardVerificationValue(string $cardVerificationValue): self
    {
        $this->cardVerificationValue = $cardVerificationValue;

        return $this;
    }


    public function isProcurementCard(): ?bool
    {
        return $this->procurementCard;
    }


    public function setProcurementCard(bool $procurementCard): self
    {
        $this->procurementCard = $procurementCard;

        return $this;
    }


    public function getCustomerAccountingCode(): ?string
    {
        return $this->customerAccountingCode;
    }


    public function setCustomerAccountingCode(string $customerAccountingCode): self
    {
        $this->customerAccountingCode = $customerAccountingCode;

        return $this;
    }


    public function getOneTimeToken(): ?OneTimeToken
    {
        return $this->oneTimeToken;
    }


    public function setOneTimeToken(OneTimeToken $oneTimeToken): self
    {
        $this->oneTimeToken = $oneTimeToken;

        return $this;
    }


    public function getCardReader(): ?string
    {
        return $this->cardReader;
    }


    public function setCardReader(string $cardReader): self
    {
        $this->cardReader = $cardReader;

        return $this;
    }


    public function getCardData(): ?string
    {
        return $this->cardData;
    }


    public function setCardData(string $cardData): self
    {
        $this->cardData = $cardData;

        return $this;
    }
}
