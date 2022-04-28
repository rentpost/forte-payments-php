<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Rentpost\ForteApi\Attribute as Attribute;
use Symfony\Component\Validator\Constraints as Assert;

class Reason extends AbstractModel
{
    /**
     * @var string
     */
    #[Assert\NotBlank]
    protected $code;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    protected $title;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    protected $description;

    /**
     * @var string
     */
    #[Assert\NotBlank]
    protected $infoRequired;


    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getInfoRequired(): string
    {
        return $this->infoRequired;
    }

    public function setInfoRequired(string $infoRequired): self
    {
        $this->infoRequired = $infoRequired;

        return $this;
    }

}
