<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reason model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Reason extends AbstractModel
{

    #[Assert\NotBlank]
    protected string $code;

    #[Assert\NotBlank]
    protected string $title;

    #[Assert\NotBlank]
    protected string $description;

    #[Assert\NotBlank]
    protected string $infoRequired;


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


    public function setTitle(string $title): self
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
