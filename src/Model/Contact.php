<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute;
use Rentpost\ForteApi\Model as Model;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Contact extends AbstractModel
{

    /**
     * @var string|null
     * @Assert\Choice({
     *     "primary",
     *     "sales",
     *     "billing",
     *     "support",
     *     "technical"
     * })
     */
    protected $type;

    /**
     * @var string|null
     * @Assert\NotBlank()
     */
    protected $fullName;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $emailAddress;

    /**
     * @var Attribute\Phone|null
     * @Assert\NotBlank()
     */
    protected $phone;


    /**
     * Get type
     */
    public function getType(): ?string
    {
        return $this->type;
    }


    /**
     * Set type
     *
     * @param string $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    /**
     * Get the value of fullName
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }


    /**
     * Set the value of fullName
     *
     * @param string $fullName
     */
    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }


    /**
     * Get the value of emailAddress
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }


    /**
     * Set the value of emailAddress
     *
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }


    /**
     * Get the value of phone
     */
    public function getPhone(): ?Attribute\Phone
    {
        return $this->phone;
    }


    /**
     * Set the value of phone
     *
     * @param Attribute\Phone $phone
     */
    public function setPhone(Attribute\Phone $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
