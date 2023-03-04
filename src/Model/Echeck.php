<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Echeck model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Echeck extends AbstractModel
{

    protected ?string $accountHolder;

    // Read-only field
    protected ?string $last4AccountNumber;

    protected ?Attribute\BankAccountNumber $accountNumber;
    protected ?Attribute\BankRoutingNumber $routingNumber;

    #[Assert\Choice(['Checking', 'Savings'])]
    protected ?string $accountType;

    protected ?string $itemDescription;
    protected ?string $secCode;
    protected ?Attribute\Id\OneTimeToken $oneTimeToken;


    public function getAccountHolder(): ?string
    {
        return $this->accountHolder;
    }


    public function setAccountHolder(string $accountHolder): self
    {
        $this->accountHolder = $accountHolder;

        return $this;
    }


    public function getLast4AccountNumber(): ?string
    {
        return $this->last4AccountNumber;
    }


    /**
     * @internal api read only field
     */
    public function setLast4AccountNumber(string $last4AccountNumber): self
    {
        $this->last4AccountNumber = $last4AccountNumber;

        return $this;
    }


    public function getAccountNumber(): ?Attribute\BankAccountNumber
    {
        return $this->accountNumber;
    }


    public function setAccountNumber(Attribute\BankAccountNumber $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }


    public function getRoutingNumber(): ?Attribute\BankRoutingNumber
    {
        return $this->routingNumber;
    }


    public function setRoutingNumber(Attribute\BankRoutingNumber $routingNumber): self
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }


    public function getAccountType(): ?string
    {
        return $this->accountType;
    }


    public function setAccountType(string $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }


    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }


    public function setItemDescription(string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }


    public function getSecCode(): ?string
    {
        return $this->secCode;
    }


    public function setSecCode(string $secCode): self
    {
        $this->secCode = $secCode;

        return $this;
    }


    public function getOneTimeToken(): ?Attribute\Id\OneTimeToken
    {
        return $this->oneTimeToken;
    }


    public function setOneTimeToken(Attribute\Id\OneTimeToken $oneTimeToken): self
    {
        $this->oneTimeToken = $oneTimeToken;

        return $this;
    }
}
