<?php

declare(strict_types = 1);

namespace Rentpost\ForteApi\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Service model
 *
 * @author Jacob Thomason <jacob@rentpost.com>
 */
class Service extends AbstractModel
{

    #[Assert\Valid]
    protected EcheckSetting $echeck;

    #[Assert\Valid]
    protected CardSetting $card;


    public function getEcheck(): EcheckSetting
    {
        return $this->echeck;
    }


    public function setEcheck(EcheckSetting $echeck): self
    {
        $this->echeck = $echeck;

        return $this;
    }


    public function getCard(): CardSetting
    {
        return $this->card;
    }


    public function setCard(CardSetting $card): self
    {
        $this->card = $card;

        return $this;
    }
}
