<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * FundingSource model
 *
 * @author Sam Anthony <sam@rentpost.com>
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class FundingSource extends AbstractModel
{

    #[Assert\Length(max: 4)]
    protected string $code;

    #[Assert\NotBlank]
    protected string $description;


    public function getCode(): string
    {
        return $this->code;
    }


    public function setCode(string $code): self
    {
        $this->code = $code;

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
}
