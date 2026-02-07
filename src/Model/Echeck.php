<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\BankAccountNumber;
use Rentpost\ForteApi\Attribute\BankRoutingNumber;
use Rentpost\ForteApi\Attribute\Id\OneTimeToken;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Echeck model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Echeck extends AbstractModel
{

    #[Assert\NotBlank]
    protected string $accountHolder;

    // API Read-only field
    protected ?string $last4AccountNumber;

    protected BankAccountNumber $accountNumber;
    protected BankRoutingNumber $routingNumber;

    #[Assert\Choice(choices: ['Checking', 'Savings'])]
    protected ?string $accountType = null;

    protected ?string $itemDescription = null;

    // Required for "sale", "authorize", "credit" and "force" actions
    protected ?string $secCode = null;

    protected ?OneTimeToken $oneTimeToken = null;


    public function getAccountHolder(): string
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
    public function setLast4AccountNumber(?string $last4AccountNumber): self
    {
        $this->last4AccountNumber = $last4AccountNumber;

        return $this;
    }


    public function getAccountNumber(): BankAccountNumber
    {
        return $this->accountNumber;
    }


    public function setAccountNumber(BankAccountNumber $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }


    public function getRoutingNumber(): BankRoutingNumber
    {
        return $this->routingNumber;
    }


    public function setRoutingNumber(BankRoutingNumber $routingNumber): self
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }


    public function getAccountType(): ?string
    {
        return $this->accountType;
    }


    public function setAccountType(?string $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }


    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }


    public function setItemDescription(?string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }


    public function getSecCode(): ?string
    {
        return $this->secCode;
    }


    public function setSecCode(?string $secCode): self
    {
        $this->secCode = $secCode;

        return $this;
    }


    public function getOneTimeToken(): ?OneTimeToken
    {
        return $this->oneTimeToken;
    }


    public function setOneTimeToken(?OneTimeToken $oneTimeToken): self
    {
        $this->oneTimeToken = $oneTimeToken;

        return $this;
    }
}
