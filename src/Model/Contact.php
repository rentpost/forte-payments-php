<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute\Phone;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Contact extends AbstractModel
{

    #[Assert\Choice(choices: ['primary', 'sales', 'billing', 'support', 'technical'])]
    protected ?string $type = null;

    #[Assert\NotBlank(allowNull: true)]
    protected ?string $fullName = null;

    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Email]
    protected ?string $emailAddress = null;

    protected ?Phone $phone = null;


    public function getType(): ?string
    {
        return $this->type;
    }


    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getFullName(): ?string
    {
        return $this->fullName;
    }


    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }


    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }


    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }


    public function getPhone(): ?Phone
    {
        return $this->phone;
    }


    public function setPhone(?Phone $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
