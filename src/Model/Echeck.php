<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Echeck model
 * 
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Echeck extends AbstractModel
{

    /**
     * @var string
     */
    protected $accountHolder;

    /**
     * api read only field
     * @var string
     */
    protected $last4AccountNumber;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var Attribute\BankRoutingNumber
     */
    protected $routingNumber;

    /**
     * @var string
     * @Assert\Choice({"Checking", "Savings"})
     */
    protected $accountType;

    /**
     * @var string
     */
    protected $itemDescription;

    /**
     * @var string
     */
    protected $secCode;

    /**
     * @var string
     */
    protected $oneTimeToken;


    /**
     * @return string
     */
    public function getAccountHolder(): ?string
    {
        return $this->accountHolder;
    }


    /**
     * @param string $accountHolder
     *
     * @return self
     */
    public function setAccountHolder(string $accountHolder): self
    {
        $this->accountHolder = $accountHolder;

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
     * @internal api read only field
     *
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
     * @return Attribute\BankAccountNumber
     */
    public function getAccountNumber(): ?Attribute\BankAccountNumber
    {
        return $this->accountNumber;
    }


    /**
     * @param Attribute\BankAccountNumber $accountNumber
     *
     * @return self
     */
    public function setAccountNumber(Attribute\BankAccountNumber $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }


    /**
     * @return Attribute\BankRoutingNumber
     */
    public function getRoutingNumber(): ?Attribute\BankRoutingNumber
    {
        return $this->routingNumber;
    }


    /**
     * @param Attribute\BankRoutingNumber $routingNumber
     *
     * @return self
     */
    public function setRoutingNumber(Attribute\BankRoutingNumber $routingNumber): self
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }


    /**
     * @return string
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }


    /**
     * @param string $accountType
     *
     * @return self
     */
    public function setAccountType(string $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }


    /**
     * @return string
     */
    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }


    /**
     * @param string $itemDescription
     *
     * @return self
     */
    public function setItemDescription(string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }


    /**
     * @return string
     */
    public function getSecCode(): ?string
    {
        return $this->secCode;
    }


    /**
     * @param string $secCode
     *
     * @return self
     */
    public function setSecCode(string $secCode): self
    {
        $this->secCode = $secCode;

        return $this;
    }


    /**
     * @return Attribute\Id\OneTimeToken
     */
    public function getOneTimeToken(): ?Attribute\Id\OneTimeToken
    {
        return $this->oneTimeToken;
    }


    /**
     * @param Attribute\Id\OneTimeToken  $oneTimeToken
     *
     * @return self
     */
    public function setOneTimeToken(Attribute\Id\OneTimeToken $oneTimeToken): self
    {
        $this->oneTimeToken = $oneTimeToken;

        return $this;
    }



}
